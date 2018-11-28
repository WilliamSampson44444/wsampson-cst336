<?php
    $usernames = array("eddy","ted","teddy","eddie","edward");
    if  (in_array($_GET['username'], $usernames)) {
      echo '1';
    } else {
      echo '0';
    }
?>
