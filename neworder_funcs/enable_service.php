<?php
    require_once '../functions/config.php';

    $ids = $_POST['id_srvs1'];
    $sql_q = "UPDATE tbl_services SET status = 1 WHERE id = " . $ids;

    if (mysqli_query($connect, $sql_q)) {
        echo 'Done';
    }