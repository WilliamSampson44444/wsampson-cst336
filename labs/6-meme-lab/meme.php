<?php
include 'database.php';

#Creates a meme, called when welcome.php redirects to meme.php
function createMeme($line1, $line2, $memeType, $memeURL) {

    $dbConn = getDatabaseConnection(); 

    $sql = "INSERT INTO `meme_lab` (`id`, `line1`, `line2`, `meme_type`, `meme_url`, `create_date`) VALUES (NULL, '$line1', '$line2', '$memeType', '$memeURL', NOW());"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
}

#Sets up and executes SQL query to get all memes in database
function getMemes() {

    $dbConn = getDatabaseConnection(); 

    $sql = "SELECT * from meme_lab"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll();
    
    displayMemes($records);
    
}

#Sets up & executes SQL query searching for specific memes
function searchMemes(){
    $dbConn = getDatabaseConnection(); 

    $sql = "SELECT * from meme_lab WHERE 1 ";
    
    if(isset($_POST['search']) && !empty($_POST['search'])){
        $sql .= "AND (line1 LIKE '%" . $_POST['search'] . "%' or line2 LIKE '%" . $_POST['search'] . "%')";
    }
    if(isset($_POST['meme-type']) && !empty($_POST['meme-type'])){
        $sql .= "AND meme_type = '" . $_POST['meme-type'] . "'";
    }
    if(isset($_POST['orderBy'])){
        $sql .= " order by create_date";
        if($_POST['orderBy'] == "newFirst"){
            $sql .= " desc";
        }
    }
    
    
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    displayMemes($records);
}

#Displays memes given to it from either searchMemes() or getMemes()
function displayMemes($records){
    foreach ($records as $record) {
        echo '<div class="meme-div" style="background-image:url(' . $record["meme_url"] .');">';
        echo '<h2 class="line1">' . $record["line1"] . '</h2>';
        echo '<h2 class="line2">' . $record["line2"] . '</h2>';
        echo '</div>';
    }
}


#Enters new meme into database
if (isset($_POST['line1']) && isset($_POST['line2'])) {
    $memeType = $_POST['memeType'];
    if($memeType == "college-grad"){
        $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/c/ca/LinusPaulingGraduation1922.jpg';
    }else if($memeType == "thinking-ape"){
        $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Deep_in_thought.jpg';
    }else if($memeType == "old-class"){
        $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/4/47/StateLibQld_1_100348.jpg';
    }else if($memeType == "coding"){
        $memeURL = 'https://upload.wikimedia.org/wikipedia/commons/b/b9/Typing_computer_screen_reflection.jpg';
    }
    createMeme($_POST['line1'], $_POST['line2'], $memeType, $memeURL); 
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>A Meme</title>
        <meta charset="utf-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        
        <?php if(isset($_POST['line1']) || isset($_POST['line2'])){ #Displays new meme on webpage?>
        <h1>Your Meme</h1>
        <div class="meme-div" style="background-image:url('<?php echo $memeURL;?>')">
            <h2 class="line1"><?=$_POST['line1']?></h2>
            <h2 class="line2"><?=$_POST['line2']?></h2>
        </div>
        <?php } ?>
        
        <h1>All Memes</h1>
        Search:
        <form method="post" action="meme.php">
            <input type="text" name="search"></input>
            Meme type:<select name="meme-type">
                <option value=""></option>
                <option value="college-grad">Happy College Grad</option>
                <option value="thinking-ape">Deep Thought Monkey</option>
                <option value="coding">Learning to Code</option>
                <option value="old-class">Old Classroom</option>
            </select>
            <input type="radio" name="orderBy" value="newFirst">Newest First
            <input type="radio" name="orderBy" value="oldFirst">Oldest First
            <input type="submit"></input>
        </form><br>
        
        <div class="memes-container">
        <?php #Searching for memes, if search terms specified by user
            if((isset($_POST['search']) && !empty($_POST['search'])) or $_POST['meme-type'] != ""){
                echo "<h1>" . $_POST['meme-type'] . " Memes Containing " . $_POST['search'] . ":</h1>";
                searchMemes();
            }else{#Otherwise, displays all memes
                getMemes();
            }
        ?></div><div style="clear:both"></div><br>

    </body>
</html>