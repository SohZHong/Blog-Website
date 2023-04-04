<?php
    
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "agrilah";

    //Create Database Connection
    //short hand (website, username, password, database name)
    $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

    //Check Connection
    if($db->connect_error){
        die('Connection Failed :'.$db->connect_error);
    }
?>