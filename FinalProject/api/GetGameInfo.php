<?php

session_start();

if(!isset($_GET['submitBtn']))
{
    include 'sql/VGconnection.php';
    $dbConn = dbConnection('videogames');
    function getGameInfo()
    {
        $gameTitle = $_GET['gameSearch'];
        global $dbConn;
        $sql = "SELECT * FROM videogames NATURAL JOIN sellerRetailer,gameConsole WHERE title = $gameTitle";
        $statement = $dbConn->prepare($sql);
        $statement->execute();
        $gameInfo = $statement->fetch();
        return $gameInfo;
        
    }
    $game = getGameInfo();
    
    
    echo json_encode($game); 


}

?>