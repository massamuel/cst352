<?php
session_start();

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function displayAllAuthors() {
    global $dbConn;
    $sql = "SELECT firstName, lastName, country FROM q_author ORDER BY lastName ASC";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    $records = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($records as $record) {
        
        echo "[<a href='updateAuthor.php'>update</a>]";
        echo "[<a href='deleteAuthor.php'>delete</a>]";
        
        echo $record['firstName'] . " " . $record['lastName'] . " ". $record['country'] . "<br>";
    }
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>admin section</title>
    </head>
    <style type="text/css">
        form {
            display: inline-block;
        }
    </style>
    <body>
        
        <h1>Admin Section</h1>
        
        
        Welcome <?= $_SESSION['adminName']; ?>
        <hr>
        <br>
        
        <form action="addAuthor.php">
            <input type="submit" name="addAuthor" value="add new author"/>
            
        </form>
        
        <form action="logout.php">
            <input type="submit" name="logout" value="logout"/>
        </form>

        
        <br />
        <br />
        <?= displayAllAuthors(); ?>
    </body>
    
    
</html>