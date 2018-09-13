<?php
    /* konektujemo se na db */
    $host = '127.0.0.1';
    $user = 'root';
    $password = '';
    $databasename = 'test_db';
    $connect = mysqli_connect($host, $user, $password, $databasename);

    $id = $_POST['id_active'];
    $sqlquery = "UPDATE tbl_users SET status = 1 WHERE id = " . $id;

    if (mysqli_query($connect, $sqlquery)) {
        echo 'User ID: ' . $id . ' activated!';
    }
?>