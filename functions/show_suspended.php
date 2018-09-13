<?php
    $host = '127.0.0.1';
    $user = 'root';
    $pw = '';
    $db = 'test_db';
    $connect = mysqli_connect($host, $user, $pw, $db);

    /* sql upit za select user-a iz db */
    $sqlquery = "SELECT * FROM tbl_users ORDER BY id DESC";
    $result = mysqli_query($connect, $sqlquery);
    $all = mysqli_num_rows($result);

    $sqlActiveUsers = "SELECT * FROM tbl_users WHERE status = 1";
    $result1 = mysqli_query($connect, $sqlActiveUsers);
    $active = mysqli_num_rows($result1);

    $sqlSuspendedUsers = "SELECT * FROM tbl_users WHERE status = 0";
    $result2 = mysqli_query($connect, $sqlSuspendedUsers);
    $suspended = mysqli_num_rows($result2);

    $output = '
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
                            <li><button class="btn btn-xs btn-default" id="show_all" style="width: 200px;">All <span class="badge" style="background-color: #007bff">'.$all.'</span></button></li>
                            <li><button class="btn btn-xs btn-default" id="show_active" style="width: 200px;">Active <span class="badge" style="background-color: #28a745">'.$active.'</span></button></li>
                            <li><button class="btn btn-xs btn-default" id="show_suspended" style="width: 200px;">Suspended <span class="badge" style="background-color: #dc3545">'.$suspended.'</span></button></li>
                        </ul>
                    </div>
                </th>
                <th></th>
            </tr>
        </thead>';

    if ($suspended > 0) {
        $output .= '<tbody>';
        while($row = mysqli_fetch_array($result2)) {
            $output .= '
            <tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['username'] . '</td>
                <td>' . $row['email'] . '</td>
                <td>' . $row['skype'] . '</td>
                <td>' . $row['balance'] . '</td>';
                $output .= '<td>Suspended</td><td><button class="btn btn-xs btn-success" id="btn_active" data-id1="'.$row['id'].'">Activate user</button></td>';
            $output .= '</tr>';
        }

        $output .= '</tbody>';
    } else {
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