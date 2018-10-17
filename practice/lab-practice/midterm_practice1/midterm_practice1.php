<?php
    session_start();

function randPlaces($country){
    $places = array();
    if($country == "France"){
        array_push($places, "Bordeaux", "Le_Havre", "Lyon", "Montpellier", "Paris", "Strasbourg");
    }else if ($country == "Mexico"){
        array_push($places, "Acapulco", "Cabos", "Cancun", "Chichenitza", "Huatulco", "Mexico_City");
    }else{
        array_push($places, "Chicago", "Hollywood", "Las_Vegas", "New_York", "Washington_DC", "Yosemite");
    }
    
    $rand = array_rand($places, (int)$_POST["locations"]);
    $ret = array();
    foreach ($rand as $key){
        array_push($ret, $places[$key]);
    }
    
    if($_POST["alpha"] == "true"){
        sort($ret);
        return $ret;
    }else if ($_POST["alpha"] == "false"){
        rsort($ret);
        return $ret;
    }else{
        return $ret;
    }
}

?>

<!DOCTYPE html>
<html  lang=en>
  <head>
    <meta charset="utf-8"/>
    <title>Winter Vacation Planner!</title>
    <link href="styles.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <h1>Winter Vacation Planner!</h1>
    
    <div>
        <form method="post">
            <select name="month">
                <option>Select</option>
                <option value="11">November</option>
                <option value="12">December</option>
                <option value="1">January</option>
                <option value="2">February</option>
            </select><br>
            
            Number of locations:
            <input type="radio" name="locations" value=3><b>Three</b>
            <input type="radio" name="locations" value=4><b>Four</b>
            <input type="radio" name="locations" value=5><b>Five</b><br>
            
            <select name="country">
                <option value="USA">USA</option>
                <option value="Mexico">Mexico</option>
                <option value="France">France</option>
            </select><br>
            
            Visit ocations in alphabetical order:
            <input type="radio" name="alpha" value=true><b>A-Z</b>
            <input type="radio" name="alpha" value=false><b>Z-A</b><br>
            
            <input type=submit>
        </form>
    </div>
    <div>
    <?php
        #var_dump($_POST);
        
        if(!isset($_POST["month"])){
            echo "Please select a month for your vacation!";
        }else if(!isset($_POST["locations"])){
            echo "Please select the number of locations to visit!";
        }else{
            if($_POST["month"] == "11"){
                $days = 30;
                $month = "November";
            }else if($_POST["month"] == "12"){
                $days = 31;
                $month = "December";
            }else if($_POST["month"] == "1"){
                $days = 31;
                $month = "January";
            }else{
                $days = 28;
                $month = "February";
            }
            echo "<h2>" . $month . " Itinerary</h2><br>";
            echo "Visiting " . $_POST["locations"] . " places in " . $_POST["country"] . "<br><br>";

            $day = 1;
            $randDays = array();
            $places = randPlaces($_POST["country"]);
            #var_dump($places);
            for($i = 0; $i < (int)$_POST["locations"]; $i++){
                $rand = rand(1,$days);
                if(isset($randDays[$rand])){
                    $i--;
                }else{
                    $randDays[$rand] = true;
                }
            }
            $placeNum = 0;
            echo "<table>";
            for($i = 0; $i < 5; $i++){
                echo "<tr>";
                for($j = 0; $j < 7; $j++){
                    echo "<td>";
                    if($day <= $days){
                        echo $day . "<br>";
                    }
                    if(isset($randDays[$day])){
                        echo "<img src='img/". $_POST["country"] . "/" . strtolower($places[$placeNum]).".png'>";
                        echo "<br>" . $places[$placeNum] . "<br>";
                        $placeNum++;
                    }
                    echo "</td>";
                    $day++;
                }
                echo "</tr>";
            }
            echo "</table><br>";
            echo "<h3>Monthly Itinerary</h3>";
            if(!isset($_SESSION["itinerary"])){
                $_SESSION["itinerary"] = array();
            }
            array_push($_SESSION["itinerary"], "Month: " . $month . " , Visiting " . $_POST["locations"] . " places in " . $_POST["country"] . "<br>");
            foreach ($_SESSION["itinerary"] as $line){
                echo $line;
            }
        }
    ?>
    </div>
  </body>
</html>