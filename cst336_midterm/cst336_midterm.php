<?php
#Trying to figure out how to redirect back to create.php if invalid input
#We didn't go over this in class, thanks StackOverflow
$redirect = "create.php?";
if(isset($_POST['newText']) && $_POST['newText'] == ""){
    $redirect .= "text=false";
    if(isset($_POST['newText']) && $_POST['newText'] == ""){
        $redirect .= "&author=false";
    }
}else if(isset($_POST['newText']) && $_POST['newText'] == ""){
    $redirect .= "author=false";
}
if($redirect != "create.php?"){
    header("Location: " . $redirect);
}

include 'database.php';

$dbConn = getDatabaseConnection();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Random Quote Machine</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <?php
        
            $sql = "SELECT * from q_quotes"; 
            $statement = $dbConn->prepare($sql); 
            
            $statement->execute(); 
            $records = $statement->fetchAll();
            $record = $records[array_rand($records)];
            echo "<h1>" . $record['quote'] . "</h1>";
            echo "<h2><i>-" . $record['author'] . "</i></h2><br>";
            
        if(isset($_POST['newText']) && $_POST['newText'] != ""){
            $newText = $_POST['newText'];
            $newAuthor = $_POST['newAuthor'];
            $sql = $sql = "INSERT INTO `q_quotes` (`quote`, `author`) VALUES ('$newText', '$newAuthor');";
            $statement = $dbConn->prepare($sql); 
            $statement->execute(); 
        }
        ?>
        <a href="create.php">Create a Quote</a>
    </body>
</html>