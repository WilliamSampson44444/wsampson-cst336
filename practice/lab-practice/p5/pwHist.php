<?php
    session_start();
?>
<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <title>Password History</title>
    </head>
    <body>
        <h1>Password History</h1>
        <?php
            if(isset($_SESSION['pass'])){
                echo '<table>';
                for($i = 0; $i < count($_SESSION['pass']) / 4; $i++){
                    echo '<tr>';
                    for($j = 0; $j < 4; $j++){
                        echo '<td>' . $_SESSION['pass'][$i * 4 + $j] . '</td>';
                    }
                    echo '</tr>';
                }
                echo '</table>';
            }else{
                echo "SESSION['pass'] is not set!";
            }
        ?>
        <form action='index.php'>
            <button type=submit >Generate more passwords</button>
        </form>
    </body>
</html>