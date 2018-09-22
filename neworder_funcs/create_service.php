<?php
    require_once '../functions/config.php';
    $servicename = $_POST['servicename'];
    $categoryId = $_POST['categoryId'];
    $serviceType = $_POST['serviceType'];
    $provider = $_POST['provider'];
    $price = $_POST['price'];
    $min_qua = $_POST['min_qua'];
    $max_qua = $_POST['max_qua'];
    $serviceDescription = $_POST['serviceDescription'];

    $sqlquery = "INSERT INTO tbl_services (
        service_name, service_type, provider, service_rate,
        min_quantity, max_quantity, category_id, description)
        VALUES ('$servicename', '$serviceType', '$provider',
                '$price', '$min_qua', '$max_qua', '$categoryId', '$serviceDescription')";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'Service successfully added!';
    }