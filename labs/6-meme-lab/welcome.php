<!DOCTYPE html>
<html>
  <head>
    <title>Welcome</title>
    <meta charset="utf-8"/>
    <link href="styles.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <h1>Meme Generator</h1>
    <?php
    include 'database.php';
    
    $dbConn = getDatabaseConnection(); 

    $sql = "SELECT * from meme_lab"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    $record = $records[array_rand($records, 1)];
    
    echo '<div class="meme-div" style="background-image:url(' . $record["meme_url"] .');">';
    echo '<h2 class="line1">' . $record["line1"] . '</h2>';
    echo '<h2 class="line2">' . $record["line2"] . '</h2>';
    echo '</div>';
    ?>
    <div style="clear:both"></div>
    <h3>Welcome to my Meme Generator!</h3>
    
    <form method="post" action="meme.php">
      Line 1: <input type="text" name="line1"></input> <br/>
      Line 2: <input type="text" name="line2"></input> <br/>
      Meme Type:<select name="memeType">
        <option value="college-grad">Happy College Grad</option>
        <option value="thinking-ape">Deep Thought Monkey</option>
        <option value="coding">Learning to Code</option>
        <option value="old-class">Old Classroom</option>
      </select><br>
      <input type="submit"></input>
    </form>
    <a href="./meme.php">View All Memes</a>
  </body>
</html>