<?php
include 'database.php';

function createMeme($line1, $line2, $memeType, $memeURL) {

    $dbConn = getDatabaseConnection(); 

    $sql = "INSERT INTO `meme_lab` (`id`, `line1`, `line2`, `meme_type`, `meme_url`) VALUES (NULL, '$line1', '$line2', '$memeType', '$memeURL');"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
}

function getMemes() {

    $dbConn = getDatabaseConnection(); 

    $sql = "SELECT * from meme_lab"; 
    $statement = $dbConn->prepare($sql); 

    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    displayMemes($records);
    
}

function searchMemes($search){
    $dbConn = getDatabaseConnection(); 

    $sql = "SELECT * from meme_lab WHERE line1 LIKE '%$search%' or line2 LIKE '%$search%'"; 
    $statement = $dbConn->prepare($sql); 
    
    $statement->execute(); 
    $records = $statement->fetchAll(); 
    
    displayMemes($records);
}

function displayMemes($records){
    foreach ($records as $record) {
        echo '<div class="meme-div" style="background-image:url(' . $record["meme_url"] .');">';
        echo '<h2 class="line1">' . $record["line1"] . '</h2>';
        echo '<h2 class="line2">' . $record["line2"] . '</h2>';
        echo '</div>';
    }
}

if (isset($_POST['line1']) && isset($_POST['line2'])) {
    $memeType = $_POST['meme-type'];
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
    <style>
        .meme-div{
            width: 450px;
            height: 450px;
            background-size: cover;
            text-align: center;
            position: relative;
        }
        h2 {
            position: absolute;
            left: 0;
            right: 0;
            margin: 15px 0;
            padding: 0 5px;
            font-family: impact;
            color: white;
            text-shadow: 1px 1px black;
        }
        .line1 {
            top: 0;
        }
        .line2 {
            bottom: 0;
        }
        .memes-container .meme-div{
            float:left;
        }
    </style>
    </head>
    <body>
        <?php if(isset($_POST['line1']) || isset($_POST['line2'])){ ?>
        <h1>Your Meme</h1>
        <div class="meme-div" style="background-image:url('<?php echo $memeURL;?>')">
            <h2 class="line1"><?=$_POST['line1']?></h2>
            <h2 class="line2"><?=$_POST['line2']?></h2>
        </div>
        <?php } ?>
        
        <h1>Search:</h1>
        <form method="post" action="meme.php">
            <input type="text" name="search"></input> <br/>
            <input type="submit"></input>
        </form><br>
        
        <div class="memes-container">
        <?php
            if(isset($_POST['search'])){
                echo "<h1>Memes containing " . $_POST['search'] . ":</h1>";
                searchMemes($_POST['search']);
            }
        ?></div><div style="clear:both"></div><br>
        
        <h1>All Memes</h1>
        <div class="memes-container">
        <?php
            getMemes();
        ?>
        </div><div style="clear:both"></div>

    </body>
</html>