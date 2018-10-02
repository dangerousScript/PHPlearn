<?php
    require_once 'config.php';

    $username = $_POST['username'];
    $amount = $_POST['amount'];
    $sqlquery = "UPDATE tbl_users SET balance = balance + " . $amount . " WHERE username LIKE '" . $username . "'";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'You have added: ' . $amount . '$ to user: ' . $username;
    }