<?php

    /* konekcija za db */
    $connection = array(
        'host' => 'localhost',
        'username' => 'root',
        'password' => 'root',
        'databasename' => 'test_db'
    );

    $connect = mysqli_connect($connection['host'], $connection['username'], $connection['password'], $connection['databasename']);