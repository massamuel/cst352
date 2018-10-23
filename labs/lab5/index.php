<?php

include '../../sqlConnection.php';


$dbConn = getConnection("quotes");

function displayAllQuotes() {
    global $dbConn;
    $sql = "SELECT authorId, firstName, lastName, quote FROM q_quotes NATURAL JOIN q_author";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    //$records = $statement -> fetch();
    $records = $statement -> fetchAll();
    
    
    foreach($records as $record) {
        echo $record['authorId'] . ": " . $record['quote'] . "<br>";
    }
}

function displayRandomQuotes() {
    global $dbConn;
    $random = rand(0,26);
    
    $sql = "SELECT authorId, firstName, lastName, quote FROM q_quotes NATURAL JOIN q_author LIMIT $random,1";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    //$records = $statement -> fetch();
    $records = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($records as $record) {
        echo $record['authorId'] . ": " . $record['quote'] . "<br>";
        
        echo "<a target='authorInfo' href='authorInfo.php?authorId=". $record['authorId'] ." '>";
        echo $record['firstName']. ", ".$record['lastName']. "<br>";
        echo "</a>";
        
        
    }
}


?>


<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Random Famous Quote</h1>
        
        <?= displayRandomQuotes(); ?>
        
        
        
        <iframe name="authorInfo" width=600 height=300></iframe>
        
    </body>
</html>