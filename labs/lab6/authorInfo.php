<?php

session_start();

if(!isset($_SESSION['adminName']))
{
    header("location: index.php");
}

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function getAuthorInfo()
{
    global $dbConn;
    $sql = "SELECT * FROM q_author WHERE authorId = ". $_GET['authorId'];
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $record = $statement->fetch();
    return $record;
    
}

if(isset($_GET['authorId']))
{
    $authorInfo = getAuthorInfo();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Author info</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">
    </head>
    <body>
        <h2> <?= $authorInfo['firstName']?> <?= $authorInfo['lastName']?> </h2>
        <p> <?= $authorInfo["bio"] ?> </p>
        <img src="<?=$authorInfo['picture']?>" height="100" />
        
    </body>
</html>