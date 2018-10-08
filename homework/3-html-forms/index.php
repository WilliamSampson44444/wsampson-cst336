<!DOCTYPE html>
<html lang=en>
    <head>
        <meta charset="utf-8"/>
        <link href="styles.css" rel="stylesheet" type="text/css" />
        <title>Birthday Present Reminder</title>
    </head>
    <body>
        <h1>Birthday Present Reminder</h1>
        <div>
            <form method='post'>
                <br><label for='name'>Name:</label>
                <input type=text name='name' value=<?php echo $_POST['name']; ?>><br><br>
                <br><label for='day'>Day:</label>
                <input type=text name='day' value=<?php echo $_POST['day']; ?>><br><br>
                <br><label for='month'>Month:</label>
                <!-- Should probably make a function for selected, but it would look about
                as ugly as this anyways.-->
                <select name='month' value=<?php echo $_POST['month']; ?>>
                    <option value='1' <?php if($_POST['month']=="1")echo'selected="selected"';?>>
                        January</option>
                    <option value='2' <?php if($_POST['month']=="2")echo'selected="selected"';?>>
                        February</option>
                    <option value='3' <?php if($_POST['month']=="3")echo'selected="selected"';?>>
                        March</option>
                    <option value='4' <?php if($_POST['month']=="4")echo'selected="selected"';?>>
                        April</option>
                    <option value='5' <?php if($_POST['month']=="5")echo'selected="selected"';?>>
                        May</option>
                    <option value='6' <?php if($_POST['month']=="6")echo'selected="selected"';?>>
                        June</option>
                    <option value='7' <?php if($_POST['month']=="7")echo'selected="selected"';?>>
                        July</option>
                    <option value='8' <?php if($_POST['month']=="8")echo'selected="selected"';?>>
                        August</option>
                    <option value='9' <?php if($_POST['month']=="9")echo'selected="selected"';?>>
                        September</option>
                    <option value='10' <?php if($_POST['month']=="10")echo'selected="selected"';?>>
                        October</option>
                    <option value='11' <?php if($_POST['month']=="11")echo'selected="selected"';?>>
                        November</option>
                    <option value='12' <?php if($_POST['month']=="12")echo'selected="selected"';?>>
                        December</option>
                </select><br><br>
                <br><label for='year'>Year:</label>
                <input type=text name='year' value=<?php echo $_POST['year']; ?>><br><br>
                Present Idea:<br><textarea rows='10' cols='30' name='present'><?php echo $_POST['present']; ?></textarea><br>
                <input type=submit>
            </form>
        </div>
        <div>
            <h2>
            <?php
                #Do some calculations to recommend a date
                #to have decided & bought present by
                
                #var_dump($_POST);
                
                #Yell at user for any missing data in submission
                if($_POST['name'] == ''){
                    echo "Please enter the name of the recipient!";
                }else if($_POST['day'] == ''){
                    echo "Please enter the day of the birthday!";
                }else if($_POST['month'] == ''){
                    echo "Please enter the month of the birthday!";
                }else if($_POST['year'] == ''){
                    echo "Please enter the year of the birthday!";
                }else{#Otherwise, do things
                    #Recommending buying the gift 1 week-ish before birthday
                    echo 'You should find "' . $_POST['present'] . '" for '. $_POST['name'] . ' before ';
                    if((int)$_POST['day'] < 7){#If less than 1 week into month
                        if((int)$_POST['month'] == 1){#If less than 1 month into year
                            echo '12/' . (string)((int)$_POST['day'] + 24) . "/" . (string)((int)$_POST['year'] - 1);
                        }else{
                        echo (string)((int)$_POST['month'] - 1) . "/" . (string)((int)$_POST['day'] + 24) . "/" . $_POST['year'];
                        }
                    }else{
                        echo $_POST['month'] . "/" . (string)((int)$_POST['day'] - 7) . "/" . $_POST['year'];
                    }
                }
            ?>
            <br>
            </h2>
        </div>
        <footer>
            <hr>
            <img src="csumb-logo-blue.svg" alt="CSUMB" height="50"/> <br />
            CST 336 Internet Programming. 2018&copy; Sampson <br />
            <strong>Disclaimer:</strong> The information in this webpage is fictitious. <br />
            It is to be used for academic purposes only.
        </footer>
    </body>
    
</html>