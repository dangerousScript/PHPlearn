<?php
    require_once '../functions/config.php';

    $id = $_POST['idCancel'];
    $sqlquery = "UPDATE tbl_todo SET status = 2 WHERE id = '$id'";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'TODO id: ' . $id . ' canceled!';
    }