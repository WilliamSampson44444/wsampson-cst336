<!DOCTYPE html>
<html lang=en>
  <head>
    <meta charset="utf-8"/>
    <title>Aces vs. Kings</title>
  </head>
  <body>
      <h1>Aces vs. Kings</h1>
      <form method="POST">
          <div>Number of Rows:<input type="text" name="rows"></div>
          <div>Number of Columns:<input type="text" name="columns"></div>
          <div>Suit to omit: 
          <select name="omit">
            <option value="0">Clubs</option>
            <option value="1">Diamonds</option>
            <option value="2">Hearts</option>
            <option value="3">Spades</option>
          </select>
          <input type="submit" value="Submit"/></div>
      </form>
      <?php
        var_dump($_POST);
      ?>
  </body>
</html>
