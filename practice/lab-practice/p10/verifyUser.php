<?php
session_start();
if (isset($_POST['username'])) {
    
$host = "localhost";
$user = "williamsampson";
$pass = "cst336";
$dbname = "c9"; 

// Create connection
$dbConn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
$dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "SELECT * FROM `p10_users` WHERE username=:username AND password=SHA(:password)"; 
    $statement = $dbConn->prepare($sql); 
    $statement->execute(array(':username' => $_POST['username'], ':password' => $_POST['password']));

    $records = $statement->fetchAll(); 
    var_dump($records, $_POST['username'], $_POST['password']);
    if (count($records) == 1) {
        // login successful
        $_SESSION['user_id'] = $records[0]['userId']; 
        $_SESSION['username'] = $records[0]['username']; 
        header('Location: index.php');
    }  else {
        echo "<div class='error'>Username and password are invalid </div>"; 
    }
}
?>