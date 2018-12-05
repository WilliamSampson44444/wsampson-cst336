<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>   
        <style>
            body {
                text-align: center;
            }
        </style>
   
    </head>
    <body>
        
	<!--Add main menu here -->
	      <?php include 'navigation.php'; ?>
        
        
        <div class="jumbotron">
          <h1> CSUMB Animal Shelter</h1>
          <h2> The "official" animal adoption website of CSUMB </h2>
        </div>
        
        <!--Boostrap Carousel-->
        <div id="carousel" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <?php
                include 'api/database.php';
                $dbConn = getDatabaseConnection();
                
                $sql = "SELECT pictureURL from `pets`";
                $statement = $dbConn->prepare($sql); 
                $statement->execute();
                $records = $statement->fetchAll(); 
                $i = 0;
                foreach ($records as $record){
                    if($i == 0){
                        echo '<div class="carousel-item active">';
                        $i++;
                    }else{
                        echo '<div class="carousel-item">';
                    }
                    echo '<img class="d-block w-100" src="img/' . $record["pictureURL"] .'" alt="Item ' . $i .'">
                        </div>';
                }
            ?>
          </div>
          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        <br>
        <a class="btn btn-primary" href="pets.php" role="button"><h1>Adopt now!</h1></a>
    </body>
</html>