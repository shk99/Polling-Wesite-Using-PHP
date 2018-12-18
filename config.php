<?php

    //creating a session
    session_start();
    
    //creating database
    $db = new PDO("mysql:host=localhost", "root", "");
    $sql = "CREATE DATABASE IF NOT EXISTS poll";
    $db->exec($sql);
    $db = new PDO("mysql:host=localhost;dbname=poll","root","");
    
    //creating tables
    $sql = "CREATE TABLE IF NOT EXISTS users(
        username VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
        )";
    $db->exec($sql);
    
    $sql1 = "CREATE TABLE IF NOT EXISTS  polls(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        question VARCHAR(255) NOT NULL
        )";
    $db->exec($sql1);

    $sql2 = "CREATE TABLE IF NOT EXISTS  polls_choices(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        poll INT(11) NOT NULL,
        name VARCHAR(255) NOT NULL
        )";
    $db->exec($sql2);

    $sql3 = "CREATE TABLE IF NOT EXISTS  polls_answers(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        user VARCHAR(255) NOT NULL,
        poll INT(11) NOT NULL,
        choice INT(11) NOT NULL
        )";
    $db->exec($sql3);
?>
