<?php
include "sql/VGconnection.php";
$dbConn = getConnection("videogames");

function showGame()
{

    global $dbConn;
    
    $sql = "SELECT title, game id
              FROM 
              WHERE title LIKE ". $_GET['gameSearch']. '%';
             
    $stmt = $dbConn->prepare($sql);
    
    $stmt->execute();
    
    $games = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $games;
    
}
$games = showGame();

    echo json_encode($games);
?>