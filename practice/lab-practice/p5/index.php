<?php
    session_start();
?>
<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <title>Custom Password Generator</title>
    </head>
    <body>
        <div>
            <h1>Custom Password Generator</h1>
            <form method='post'>
                How many passwords: <input type=text name='pwnum'> (No more than 8)<br>
                <b>Password Length</b><br>
                <input type=radio name='len' value=6>6 characters
                <input type=radio name='len' value=8>8 characters
                <input type=radio name='len' value=10>10 characters<br>
                <input type=checkbox name='digits' value=True>Include digits (up to 3 digits will be part of the password)<br>
                <input type=submit value='Create Passwords!'><br><br>
            </form>
            <form method='session' action='pwHist.php'>
                <input type=submit value='Display Password History' action='pwHist.php'>
            </form>
        </div>
        <?php

            if((int)$_POST['pwnum'] <= 8){
                if(isset($_POST["len"])) {
                    echo '<h1>Random Passswords:</h1><br>';
                    for($i = 0; $i < (int) $_POST["pwnum"]; $i++) {
                        $temp = "";
                        $digitCount = 0;
                        for($j = 0; $j < (int)$_POST['len']; $j++){
                            if($_POST['digits'] && $digitCount < 3 && $j != 0){
                                $randChar = rand(65,100);
                            }else{
                                $randChar = rand(65, 90);
                            }
                            if($randChar > 90){
                                $temp .= chr($randChar - 43);
                                $digitCount++;
                                
                            }else{
                                $temp .= chr($randChar);
                            }
                        }
                        $pass[] .= $temp;
                        $_SESSION['pass'][] .= $temp;
                    }
                    sort($pass);
                    echo "Generating <b>" . $_POST['pwnum'] . "</b> passwords with <b>" . $_POST['len'] . "</b> characters:<br>";
                    for($i = 0; $i < count($pass); $i++){
                        echo $pass[$i] . "<br>";
                    }
                    #var_dump($_POST);
                    #var_dump($_SESSION);
                }
                else {
                    echo "You must fill in one length option.";
                }
            }else{
                echo "Number of passwords must be 8 or less!";
            }
        ?>
    </body>
</html>