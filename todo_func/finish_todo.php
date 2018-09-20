<?php
    require_once '../functions/config.php';

    $id = $_POST['idFinish'];
    $sqlquery = "UPDATE tbl_todo SET status = 1 WHERE id = '$id'";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'TODO id: ' . $id . ' finished!';
    }