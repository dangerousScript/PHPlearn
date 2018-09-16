<?php
    require_once 'config.php';

    $id = $_POST['id_active'];
    $sqlquery = "UPDATE tbl_users SET status = 1 WHERE id = " . $id;

    if (mysqli_query($connect, $sqlquery)) {
        echo 'User ID: ' . $id . ' activated!';
    }
?>