<?php
    require_once '../functions/config.php';

    $title = $_POST['title'];
    $description = $_POST['description'];

    $sqlquery = "INSERT INTO tbl_todo (title, description) VALUES ('$title', '$description')";

    if (mysqli_query($connect, $sqlquery)) {
        echo 'Successfully added: ' . $title;
    }