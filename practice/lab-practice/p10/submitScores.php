<?php
// connect to our mysql database server
session_start();

$host = "localhost";
$username = "williamsampson";
$password = "cst336";
$dbname = "c9"; 

// Create connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//SubmitScores
$sql = "INSERT INTO `p10_scores` (`id`, `userId`, `score`) VALUES (NULL, '" . $_SESSION['user_id'] . "', '" . json_decode($_POST['score']) . "')";
$statement = $dbConn->prepare($sql); 
$statement->execute();

$sql = "SELECT count(*) as times, avg(score) as average from p10_scores where userId = " . $_SESSION['user_id'];
$statement = $dbConn->prepare($sql); 
$statement->execute();
$records = $statement->fetchAll(); 

echo json_encode($records);
?>
