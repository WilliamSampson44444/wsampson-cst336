<!DOCTYPE html>
<html>
    <head>
        <title>HTML Forms Experimentation</title>
    </head>
    <body>
        <p><?php echo "Your favorite: ". $_POST[$name[$fav]]; ?></p>
        <form method="POST">
            <div>
                <label for="names">Names:</label>
                <div id="names">
                    <div><input type="radio" name="fav" value=0 /> <input type="text" name="name[]" id="name" /></div>
                    <div><input type="radio" name="fav" value=1 /> <input type="text" name="name[]" id="name" /></div>
                    <div><input type="radio" name="fav" value=2 /> <input type="text" name="name[]" id="name" /></div>
                    <div><input type="radio" name="fav" value=3 /> <input type="text" name="name[]" id="name" /></div>
                    <div><input type="radio" name="fav" value=4 /> <input type="text" name="name[]" id="name" /></div>
                </div>
            </div>

            <div>
                <input type="submit" value="Save" />
                <button>Save with button</button>
            </div>
        </form>
        
    </body>
</html>

<?php

require('log.inc.php');

?>
