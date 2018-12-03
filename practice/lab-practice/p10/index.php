<?php session_start(); ?>
<!DOCTYPE html>
<!-- saved from url=(0057)http://cst336.herokuapp.com/projects/csumb_quiz/index.php -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>CSUMB Online Quiz</title>
        <link href="css/styles.css" rel="stylesheet" type="text/css">
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            Welcome <?php echo $_SESSION['username'];?>!  
            <input type="button" id="logoutBtn" value="Logout">    
        </div>
        
        <!--Display Quiz Content-->
        <div class="content-wrapper">
            <div id="quiz">
              <h1>Quiz</h1>
              <form>
    <!--Question 1-->
    What year was CSUMB founded? 
    <input type="text" name="question1" size="5"><br>
    <div id="question1-feedback" class="answer"></div><br>

    <!--Question 2-->
    What is the name of CSUMB's mascot?<br>
    <input type="radio" name="question2" id="q2-1" value="A"><label for="q2-1">Otto <br>
    <input type="radio" name="question2" id="q2-2" value="B"><label for="q2-2">Albus <br>
    <input type="radio" name="question2" id="q2-3" value="C"><label for="q2-3">Monte Rey <br>
    <div id="question2-feedback" class="answer"></div><br>
    
    <!--Question 3-->
    What city is CSUMB in?<br>
    <input type="text" name="question3" size="10"><br>
    <div id="question3-feedback" class="answer"></div><br>
    
    <!--Question 4-->
    What year was the BIT's naming ceremony?<br>
    <input type="text" name="question4" size="5"><br>
    <div id="question4-feedback" class="answer"></div><br>
    
    <input type="submit" value="Submit">
    
    <!--Will display the "loading" or "spinning" animated gif-->
    <div id="waiting"></div>


<!--Will display the quiz score-->
<div id="scores"></div>            
                <div id="feedback">
                    <h2>Your final score is <span id="score"> score  </span> </h2>
                    
                    You've taken this quiz <strong id="times"></strong> time(s). <br><br>
    
                    Your average score was  <strong id="average"></strong>
                </div>
            </label></label></label></form></div>
            <div id="mascot">
                <img src="img/mascot.png" alt="CSUMB Mascot" width="350">
            </div>
        </div>
        <script
        src="https://code.jquery.com/jquery-3.3.1.min.js"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>
        <script src="js/gradeQuiz.js"></script>
    
</body></html>