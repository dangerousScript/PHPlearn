<?php
    $host = '127.0.0.1';
    $user = 'root';
    $pw = '';
    $dbname = 'test_db';
    $connect = mysqli_connect($host, $user, $pw, $dbname);

    $id = $_POST['id_suspend'];
    $sqlquery = "UPDATE tbl_users SET status = 0 WHERE id = " . $id;

    if (mysqli_query($connect, $sqlquery)) {
        echo 'User ID: ' . $id . ' suspended!';
    }
?>