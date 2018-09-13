<?php
    $host = '127.0.0.1';
    $user = 'root';
    $pw = '';
    $dbname = 'test_db';
    $connect = mysqli_connect($host, $user, $pw, $dbname);

    $username = $_POST['username'];
    $amount = $_POST['amount'];
    $sqlquery = "UPDATE tbl_users SET balance = balance + " . $amount . " WHERE username LIKE '" . $username . "'";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'You have added: ' . $amount . '$ to user: ' . $username;
    }
?>