<?php
include 'database.php';
$dbConn = getDatabaseConnection();

$sql = "SELECT * from `pets`";
$statement = $dbConn->prepare($sql); 
$statement->execute();
$records = $statement->fetchAll(); 

echo json_encode($records);
?>