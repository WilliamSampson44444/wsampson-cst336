<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
</head>

<body>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    <?php
        function matchWin($p1, $p2){//True if p2 wins, false if p1 wins
            return($p1%3 == ($p2+1)%3);
        }
        
        function winner($count){
            if($count < 2){
                return "<div id='finalWinner'><h1>The winner is Player 1</h1></div>";
            }else{
                return "<div id='finalWinner'><h1>The winner is Player 2</h1></div>";
            }
        }
        
        function pic($num){
            if($num == 0)
                    return "rps/scissors.png' alt='scissors";
                else if($num == 1)
                    return "rps/rock.png' alt='rock";
                else
                    return "rps/paper.png' alt='paper";
        }
        $html;
        $count = 0;
        for($i = 0; $i < 3; $i++){
            $p1 = rand(0,2);
            $p2 = rand(0,2);
            while($p1 == $p2)
                $p2 = rand(0,2);
            $html .= "<div class='row'><div class='col";
            $win = matchWin($p1, $p2);

            if($win){

                $html .= ", matchWinner'><img src='";
                $html .= pic($p1);
                $html .= "' width='150'></div> <div class='col'><img src='";
                $html .= pic($p2);
                $html .= "' width='150'></div>";
            }else{
                $count+=1;
                $html .= "'><img src='";
                $html .= pic($p1);
                $html .= "' width='150'></div> <div class='col, matchWinner'> <img src='";
                $html .= pic($p2);
                $html .= "' width='150'></div>";
            }
            $html .= "</div><hr>";
        }
        $html .= winner($count);
        echo $html;
    ?>

    <p>Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/</p>
    <p>by William Sampson and Bradley Wernick</p>
</body>

</html>
