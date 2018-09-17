<?php

    /* konekcija za db */
    $connection = array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'databasename' => 'test_db'
    );

    $connect = mysqli_connect($connection['host'], $connection['username'], $connection['password'], $connection['databasename']);