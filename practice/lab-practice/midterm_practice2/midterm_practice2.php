<?php

function getDatabaseConnection() {
    $host = "localhost";
    $username = "williamsampson";
    $password = "cst336";
    $dbname = "midterm"; 
    
    // Create connection
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $dbConn; 
}

$dbConn = getDatabaseConnection(); 

#FIRST REPORT
$sql = "SELECT town_name, population from mp_town WHERE population >= 50000 and population <= 80000"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$records = $statement->fetchAll();
foreach($records as $record){
    echo $record[town_name] . " - " . $record[population] . "<br>";
}
echo "<br>";

#SECOND REPORT
$sql = "SELECT town_name, population from mp_town order by population desc"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$records = $statement->fetchAll();
foreach($records as $record){
    echo $record[town_name] . " - " . $record[population] . "<br>";
}
echo "<br>";


#THIRD REPORT
$sql = "SELECT town_name, population from mp_town order by population limit 3"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$records = $statement->fetchAll();
foreach($records as $record){
    echo $record[town_name] . " - " . $record[population] . "<br>";
}
echo "<br>";

#FOURTH REPORT
$sql = "SELECT county_name from mp_county WHERE county_name like 'S%'"; 
$statement = $dbConn->prepare($sql); 

$statement->execute(); 
$records = $statement->fetchAll();
foreach($records as $record){
    echo $record[county_name] . "<br>";
}
?>