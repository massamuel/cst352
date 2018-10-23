<?php

include '../../sqlConnection.php';

// $host = "localhost"; //cloud9
// $dbname = "quotes";
// $username = "sampopl25";
// $password = "";

// $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
// $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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


// $sql = "SELECT * FROM q_category";
// $statement = $dbConn->prepare($sql);
// $statement -> execute();
// $records = $statement -> fetchAll(PDO::FETCH_ASSOC);

print_r($records);
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