<?php
    include_once "database.php";
    
    $dbConn = getDatabaseConnection();
    
    //$sql = "SELECT * from race where date > CURRENT_DATE and status != 'archived'"; 
    $sql = "SELECT * from `race` natural join `status` where `date` > CURRENT_DATE and `status` != 'archived'"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    echo json_encode($records);
?>