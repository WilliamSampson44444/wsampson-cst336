<?php
include 'database.php';
$dbConn = getDatabaseConnection();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <title>Popular Programming Languages</title>
        <link href="styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <h1>Famous Quote Finder</h1>
        <form method="post">
            Enter Quote Keyword <input type='text' name='keyword' value=<?php echo $_POST['keyword']; ?>><br>
            Category: <select name='category' value=<?php echo $_POST['category'];?>>
                <option>Select One</option>
                <?php
                $sql = "SELECT distinct category from p1_quotes order by category"; 
                $statement = $dbConn->prepare($sql); 
            
                $statement->execute(); 
                $records = $statement->fetchAll();

                foreach($records as $record){
                    $temp = "<option value='".$record['category'];
                    #$temp .= ($_POST['category'] == $record['category'])?" selected":"";
                        
                    $temp .= "'>" . $record['category']."</option>";
                    echo $temp;
                }
                ?>
            </select><br>
            Order<br>
            <input type='radio' name='order' value='true'
            <?=($_POST['order'] == 'true')?" checked":"" ?>> A-Z<br>
            <input type='radio' name='order' value='false'
            <?=($_POST['order'] == 'false')?" checked":"" ?>> Z-A<br>
            <input type='submit' value="Display Quotes!">
        </form><br>
        <?php
        #var_dump($_POST);
        $namedParameters = array();
        $keyword = $_POST['keyword'];
        $sql = "SELECT quote, author from p1_quotes where 1";
        
        if(!empty($keyword)){
            #$sql .= " and quote LIKE '%" . $getkeyword . "%'";
            $sql .= " and quote LIKE :keyword";
            $namedParameters[':keyword'] = "%$keyword%";
        }
        
        if(isset($_POST['category']) && $_POST['category'] != "Select One"){
            $sql .= " and category='" . $_POST['category'] . "'";
        }
    
        if(isset($_POST['order'])){
            #echo "In order if<br>";
            if($_POST['order'] == 'true'){
                $sql .= " ORDER BY quote";
            }else if($_POST['order'] == 'false'){
                $sql .= " ORDER BY quote desc";
            }
        }
        #echo $sql;
        $statement = $dbConn->prepare($sql); 
    
        $statement->execute($namedParameters); 
        $records = $statement->fetchAll();
        foreach($records as $record){
            echo $record['quote'] . "<i>(" . $record['author'] . ")</i><br>";
        }
        ?>
    </body>
</html>