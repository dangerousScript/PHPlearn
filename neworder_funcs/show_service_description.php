<?php
    require_once '../functions/config.php';

    $id_srv = $_POST['id_show'];
    $sql_qe = "SELECT description FROM tbl_services WHERE id = " . $id_srv;

    if ($res = mysqli_query($connect, $sql_qe)) {
        while ($row_sr = mysqli_fetch_array($res)) {
            echo $row_sr['description'];
        }
    }