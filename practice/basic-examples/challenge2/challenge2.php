<?php
    session_start();
    
    if(isset($_POST['destroy'])){
        session_destroy();
        session_start();
        //$_SESSION['guesses'] = array();
    }
    
    if(!isset($_SESSION['randomVal'])){
        $_SESSION['randomVal'] = rand(1,100);
    }
    var_dump($_POST);

    
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
    </head>
    <body>
        
            <?php 
                //echo $_SESSION['randomVal']; 
                if(!isset($_POST['guessNum'])){
                    echo "Guess a number between 1 and 100!";
                }else{

                    //array_push($_SESSION['guesses'], $guessNum);
                    if((int)$_POST['guessNum'] == $_SESSION['randomVal']){
                        echo "You guessed correctly!";
                    }else if((int)$_POST['guessNum'] > $_SESSION['randomVal']){
                        echo "Your guess is too high!";
                    }else{
                        echo "Your guess is too low!";
                    }
                    $_SESSION['guesses'] = (int)$_POST['guessNum'];
                }
                
            ?>
        <form method='post'>
            <input type="text" name="guessNum">
            <input type="submit" name="guess">
            <input type="submit" name="destroy" value="Start Over">
        </form><br>
        <?php

            echo "Previous guesses: ";
            print_r($_SESSION['guesses']);
            $guessCount = count($_SESSION['guesses']);
            echo "<br> Number of attempts: $guessCount";
        ?>
    </body>
</html>