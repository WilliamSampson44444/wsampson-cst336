<?php
    include_once "database.php";
    
    $dbConn = getDatabaseConnection();
    
    $sql = "update `race` set status='archived' where ID = '" . $_POST['ID']. "'"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    
    echo $sql;
?>