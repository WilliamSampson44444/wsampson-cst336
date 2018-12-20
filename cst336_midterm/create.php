<?php
include 'database.php';

$dbConn = getDatabaseConnection();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Create a Quote</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Create a new quote:</h1>
        <?php
        if(isset($_GET['text'])){
            echo "<div class='error'>Text must not be empty</div><br>";
        }
        if(isset($_GET['author'])){
            echo "<div class='error'>Author must not be empty</div><br>";
        }
        ?>
        <form method="post" action="cst336_midterm.php">
            Text: <input type="text" name="newText"><br><br>
            Author: <input type="text" name="newAuthor"><br><br>
            <input type="submit"></input>
        </form>
    </body>
</html>