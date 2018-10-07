<?php
    require_once '../functions/config.php';

    $ids = $_POST['id_srvs'];
    $sql_q = "UPDATE tbl_services SET status = 0 WHERE id = " . $ids;

    if (mysqli_query($connect, $sql_q)) {
        echo 'Done';
    }