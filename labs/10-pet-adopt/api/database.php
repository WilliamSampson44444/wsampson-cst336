<?php
// connect to our mysql database server

function getDatabaseConnection() {
    if($_SERVER['SERVER_NAME'] == "wsampson-cst336-williamsampson44444.c9users.io"){
        $host = "localhost";
        $username = "williamsampson";
        $password = "cst336";
        $dbname = "c9"; 
    }else{
        $host = "us-cdbr-iron-east-01.cleardb.net";
        $username = "b5c8793353d2d0";
        $password = "40062f6e";
        $dbname = "heroku_4646478069544f6"; 
    }
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

?>
