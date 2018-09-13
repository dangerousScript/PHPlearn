<?php
    $host = '127.0.0.1';
    $user = 'root';
    $pw = '';
    $dbname = 'test_db';
    $connect = mysqli_connect($host, $user, $pw, $dbname);

    $output = '';

    $sqlquery = "SELECT * FROM tbl_users WHERE username LIKE '%".$_POST['search']."%' OR id LIKE '%".$_POST['search']."%' OR email LIKE '%".$_POST['search']."%' OR skype LIKE '%".$_POST['search']."%'";
    $result = mysqli_query($connect, $sqlquery);

    $all = mysqli_num_rows($result);

    $sqlActiveUsers = "SELECT * FROM tbl_users WHERE status = 1";
    $result1 = mysqli_query($connect, $sqlActiveUsers);
    $active = mysqli_num_rows($result1);

    $sqlSuspendedUsers = "SELECT * FROM tbl_users WHERE status = 0";
    $result2 = mysqli_query($connect, $sqlSuspendedUsers);
    $suspended = mysqli_num_rows($result2);

    $output .= '
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Skype</th>
                <th>Balance</th>
                <th class="dropdown-th">
                    <div class="dropdown">
                        <button class="btn btn-th btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Status<span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="#">All <span class="badge" style="background-color: #007bff">'.$all.'</span></a></li>
                            <li><a href="#">Active <span class="badge" style="background-color: #28a745">'.$active.'</span></a></li>
                            <li><a href="#">Suspended <span class="badge" style="background-color: #dc3545">'.$suspended.'</span></a></li>
                        </ul>
                    </div>
                </th>
                <th></th>
            </tr>
        </thead>';

        if (mysqli_num_rows($result) > 0) { // ako ima rezultata
            $output .= '<tbody>';
            while($row = mysqli_fetch_array($result)) {
                $output .= '
                <tr>
                    <td>' . $row['id'] . '</td>
                    <td>' . $row['username'] . '</td>
                    <td>' . $row['email'] . '</td>
                    <td>' . $row['skype'] . '</td>
                    <td>' . $row['balance'] . '</td>';
                    if ($row['status'] < 1) {
                        $output .= '<td>Suspended</td><td><button class="btn btn-xs btn-success" id="btn_active" data-id1="'.$row['id'].'">Active user</button></td>';
                    } else {
                        $output .= '<td>Active</td><td><button class="btn btn-xs btn-danger" id="btn_suspend" data-id1="'.$row['id'].'">Suspend user</button></td>';
                    }
                $output .= '</tr>';
            }
    
            $output .= '</tbody>';
        } else { // ako nema rezultata
            $output .= '
            <tbody>
                <tr>
                    <td colspan="7">Data not found!</td>
                </tr>
            </tbody>';
        }
    
        $output .= '</table>';
    
        echo $output;
?>