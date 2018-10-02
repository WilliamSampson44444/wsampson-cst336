<?php
    $backgroundImage = "img/sea.jpg";
    
    //API call goes here
    include('api/pixabayAPI.php');
    if(isset($_GET['category']) && $_GET['category'] != ""){
        $imageURLs = getImageURLs($_GET['category'], $layout);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }else if(isset($_GET['keyword'])){
        //echo "You searched for: ".$_GET['keyword'];
        $imageURLs = getImageURLs($_GET['keyword'], $layout);
        //print_r($imageURLs);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
    
    
?>
<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8"/>
        <title>Image Carousel</title>
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    <body>
        <br>
        <?php
            if(!isset($imageURLs)){
                echo "<h2>Type a keyword to display a slideshow <br> with random images from Pixabay.com </h2>";
            }else{
                //print_r($imageURLs);
        ?>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators Here -->
            <ol class="carousel-indicators">
                <?php
                    for($i = 0; $i < 7; $i++){
                        echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                        echo ($i == 0)?" class='active'": "";
                        echo"></li>";
                    }
                ?>
            </ol>
            <!-- Wrapper for images -->
            <div class="carousel-inner" role="listbox">
                <?php
                    for($i = 0; $i < 7; $i++){
                        do{
                            $randomIndex = rand(0,count($imageURLs));
                        }while(!isset($imageURLs[$randomIndex]));
                        
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]);
                    }
                ?>
            </div>
            <!-- Controls here -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class = "sr-only">Next</span>
            </a>
        </div>
        <?php
            }
        ?>
        <!-- HTML form goes here! -->
        <form>
            <input type="text" name="keyword" placeholder="Keyword" value="<?=$_GET['keyword']?>"><br>
            <input type="radio" id="lvertical" name="layout" value="vertical">
            <label for="Vertical"></label><label for="lvertical">Vertical</label>
            <input type="radio" id="lhorizontal" name="layout" value="horizontal">
            <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
            <select name="category">
                <option value="">Select One</option>
                <option value="forest">Forest</option>
                <option value="sky">Sky</option>
                <option value="otters">Otters</option>
                <option value="sunset">Sunset</option>
                <option value="mountain">Mountain</option>
            </select><br>
            <input type="submit" value="Search"/>
        </form>
        <br><br>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </body>
</html>