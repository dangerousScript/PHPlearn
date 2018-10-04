<?php
    require_once '../functions/config.php';

    $id_todo = $_POST['id_show'];
    $sql_q = "SELECT description FROM tbl_todo WHERE id = " . $id_todo;

    if ($res = mysqli_query($connect, $sql_q)) {
        while ($descrip = mysqli_fetch_array($res)) {
            echo $descrip['description'];
        }
    }