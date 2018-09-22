<?php
    require_once '../functions/config.php';

    $categoryName = $_POST['categoryName'];
    $sqlquery = "INSERT INTO tbl_category (name) VALUES ('$categoryName')";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'New category added!';
    }
