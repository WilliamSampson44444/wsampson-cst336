<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
  
  </body>
  <?php
    $weekdays = array();
    $weekdays[] = "M";
    $weekdays[] = "T"; 
    array_push($weekdays,"W"); 
    echo "Displaying values using var_dump:";
    var_dump($weekdays);
    echo "<br><br>";
    echo "Displaying values using print_r:";
    print_r($weekdays);
    echo "<br><br>";
    array_push($weekdays,"R", "F"); 
    for ($i = 0; $i < count($weekdays); $i++) {
        echo $weekdays[$i];
    }
    echo "<br><br>";
    $i = 0;
    while ($i < count($weekdays)) {
        echo $weekdays[$i++];
    }
    echo "<br><br>";
    $i = 0;
    do {
        echo $weekdays[$i++];
    }
    while  ($i < count($weekdays));
    echo "<br><br>";
    foreach ($weekdays as $item) {
	    echo $item;
    }
    echo "<br><br>";
    $weekdaysArray = explode(",", $weekdays); 
    print_r($weekdaysArray);
    echo "<br><br>";
    $weekdaysArray = array("M","T", "W", "R", "F");   
    $weekdays =  implode("-*-", $weekdaysArray); 
    print($weekdays);
    echo "<br><br>";

  ?>
</html>
