<?php
    $host = '127.0.0.1';
    $user = 'root';
    $pw = '';
    $dbname = 'test_db';
    $connect = mysqli_connect($host, $user, $pw, $dbname);

    $username = $_POST['username'];
    $email = $_POST['email'];
    $skype = $_POST['skype'];
    $password = $_POST['password'];
    $sqlquery = "INSERT INTO tbl_users (username, password, email, skype) VALUES('".$username."', '".$password."', '".$email."', '".$skype."')";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'Username: ' . $username . ' added!';
    }
?>