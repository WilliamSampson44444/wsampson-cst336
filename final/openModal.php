<?php
    include_once "database.php";
    
    $dbConn = getDatabaseConnection();
    
    $sql = "SELECT * from race where ID = '" . $_POST['ID'] . "'"; 
    //ID doesn't get sent up by AJAX function and idk why
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    $record = $records[0];


    
    echo json_encode('<div hidden id="hiddenID">' . $record["ID"] .'</div>
        <form>
            Race ID <input type="text" id="ID"><br>
            Race Date <input type="date" id="date"><br>
            Start Time <input type="text" id="time"> 24 hour<br>
            Password <input type="text" id="passwd"><br>
            Location <textarea id="comment" rows="4" cols="50"></textarea>
        </form>')
    ;
?>