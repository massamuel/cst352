<?php
include '../../sqlConnection.php';

$dbConn = getConnection("quotes");

function displayauthorInfo(){
    global $dbConn;
    
    $authorId = $_GET['authorId'];
    
    $sql = "SELECT *FROM q_author WHERE authorId = $authorId";
    
    $statement = $dbConn ->prepare($sql);
    $statement->execute();
    $record = $statement->fetch(PDO::FETCH_ASSOC);
    
    // print_r($record);
    
    echo "<h2>Born:  ". $record['dob']. " Died: " . $record['dob']. "</h2>";
    echo "<h2>Country:  ". $record['country']. " Profession: " . $record['profession']. "</h2>";
    echo "<p>". $record['bio'] . "</p>";
    echo "<img src='".$record['picture']."'/>";
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
        
        <style>
            img {
                width:50%;
            }
        </style>
    </head>
    <body>
        <h1>Author Info</h1>
        
        <?=  displayauthorInfo(); ?>
        
        
        <!--<iframe name="authorInfo" frameholer=0 width=600 height=300></iframe>-->
        
    </body>
</html>