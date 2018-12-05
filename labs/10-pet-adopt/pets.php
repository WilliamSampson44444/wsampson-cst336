<!DOCTYPE html>
<html>
    <head>
        <title> CSUMB: Pet Shelter </title>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
        <img id="loading" style="display:none" src="img/loading.gif">
        <ul class="list-group">
        <?php
            include 'api/database.php';
            $dbConn = getDatabaseConnection();
            
            $sql = "SELECT * from `pets`";
            $statement = $dbConn->prepare($sql); 
            $statement->execute();
            $records = $statement->fetchAll(); 
            
            foreach ($records as $record){
                echo '<li class="list-group-item" ><div style="float:left"> 
                        <div id=' . $record['id'] . '>Name: <button class="openModal btn btn-primary" data-toggle="modal" data-target="#petModal">
                        ' . $record['name'] . '</button></div> Type: ' . $record['type'] .'</div>
                        <button type="button" class="btn btn-primary" id=' . $record['id'] . ' style="float:right">Adopt Me!</button>
                        </li>';
            }
        ?>
        </ul>
        
        <!-- Modal -->
        <div class="modal fade" id="petModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="name"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <img id="pic" style="float:left" src="">
                <div id="age"></div><br>
                <div id="breed"></div><br>
                <div id="desc"></div>
              </div>
            </div>
          </div>
        </div>
        <script src="js/functions.js"></script>
    </body>
</html>