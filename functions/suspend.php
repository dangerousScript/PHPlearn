<?php
    require_once 'config.php';

    $id = $_POST['id_suspend'];
    $sqlquery = "UPDATE tbl_users SET status = 0 WHERE id = " . $id;

    if (mysqli_query($connect, $sqlquery)) {
        echo 'User ID: ' . $id . ' suspended!';
    }
?>