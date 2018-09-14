<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
  <body>
  
  </body>
  <?php

    $html = "<table>";
    $sum = 0;
    for($i = 0; $i < 9; $i++){
        $html .= "<tr>";
        $num = rand();
        $sum += $num;
        $html .= "<th>".$num."</th>";

        if($num % 2 == 0)
            $html .= "<th>"."even"."</th>";
        else
            $html .= "<th>odd</th>";
            $html .= "</tr>";
    }

    echo $html;
    echo "sum: ".$sum."<br>";
    $avg = $sum/9;
    echo "average: ".$avg."<br>";
  ?>
</html>
