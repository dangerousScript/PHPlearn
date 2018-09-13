<?php
    /* konektujemo se na db */
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $databasename = 'test_db';
    $connect = mysqli_connect($host, $user, $password, $databasename);

    /* izlazna var (data) */
    $output = '';

    /* sql upit za select user-a iz db */
    $sqlquery = "SELECT * FROM tbl_users ORDER BY id DESC";
    $result = mysqli_query($connect, $sqlquery);

    $output .= '
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Skype</th>
                <th>Balance</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>';
    
    /* ako ima vise od 0 usera ispisujemo ih */
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