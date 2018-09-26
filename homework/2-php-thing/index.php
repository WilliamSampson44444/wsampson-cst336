<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <link href="styles.css" rel="stylesheet" type="text/css" />
    <title>RNGesus Test</title>
  </head>
  <body>
      <h1>RNGesus Test!</h1>
      
      <div class = "center">
        <img src="img/rngesus.jpg" alt="RNGesus" width=50%><br>
        <?php
          //Idea: Displays RNG rating image over RNGesus background
          //Implement that, then add enough fluff to fill requirements
          $rand = array();
          for($i = 0; $i < 200; $i++)
            array_push($rand, $i);
            
          
          shuffle($rand);
          
          $score = rand(0,400) + rand(-200,200);
          
          while($score < 0 || $score > 200){
            if($score > 200){
              $score -= $rand[0];
              array_splice($rand, 0, 1);
            }
            if($score < 0){
              $score += $rand[0] + $rand[1];
              array_splice($rand, 0, 2);
            }
          }
          echo "Score: " . $score . "<br>";
          if($score >= 180){
            echo "Your luck is great.";
          }else if($score >= 120){
            echo "You have good luck today.";
          }else if($score >= 80){
            echo "Your luck is average.";
          }else if($score >= 50){
            echo "Your luck is poor.";
          }else{
            echo "Don't go outside today.<br><img src='img/neverlucky.png' alt='neverlucky' height = 100>";
          }
          if($score >= 190){
            echo "<br>You are RNGesus himself.<br><img src='img/lucky.png' alt='lucky' height = 100>";
          }
        ?>
    </div>
    <div>
      <a href="index.php">Try again?</a>
    </div>
    <div class="center">
      <footer class = "disclaimer">
        <hr>
        <img src="./img/csumb-logo-blue.svg" alt="CSUMB" height="50"/> <br />
        CST 336 Internet Programming. 2018&copy; Sampson <br />
        <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
        It is to be used for academic purposes only.
      </footer>
    </div>
  </body>
</html>
