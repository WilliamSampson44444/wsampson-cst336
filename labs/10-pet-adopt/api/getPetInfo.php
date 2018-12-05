<?php
include 'database.php';
$dbConn = getDatabaseConnection();

$sql = "SELECT * from `pets` where name = '" . $_POST['name'] . "'";
$statement = $dbConn->prepare($sql); 
$statement->execute();
$records = $statement->fetchAll(); 

echo json_encode($records[0]);
?>