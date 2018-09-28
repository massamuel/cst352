<?php 
    $deck = range(1,52);
    $suit = array("clubs", "diamonds","hearts", "spades");
    shuffle($deck);
    $totalPoints = 0;
    
    function hand() {
        
        $aceCounter = 0; 
        $pointCounter = 0;
        
        global $suit, $deck, $totalPoints;
        
        for($i = 0; $i < 5; $i++)
        {
            $cardValue = array_pop($deck);
            $faceValue = $cardValue % 13;
            $pointCounter += $faceValue;
            if($faceValue == 1)
            {
               echo "<img style='border: solid 4px yellow' src='cards/".$suit[rand(0, count($suit) - 1)]."/$faceValue.png'"; 
               ++$aceCounter;
            }
            if($faceValue == 0)
            {
                $faceValue = 13;
            }
            $indexSuit = ($cardValue-1)/13;
            echo "<img src='cards/".$suit[$indexSuit]."/$faceValue.png'/>";
            
        }
        echo "<p>$pointCounter</p>";
        $totalPoints+=$pointCounter;
        return $aceCounter;
    } 
    
    function displayWinner($num1, $num2)
    {
        global $totalPoints;
        echo "<h1>";
        if($num1 > $num2) 
        {
            echo "Player 1 Wins.";
        }
        else if($num2 < $num2)
        {
            echo "Player 2 Wins.";
        }
        else 
        {
            echo "Tie.";
        }
        echo " Total points: $totalPoints</h1>";
    }
?>
<!DOCTYPE html>
<html lang = "en-US">
    <head>
        <meta charset="UTF-8">
        <title>Lab 3</title>
        <link href="https://fonts.googleapis.com/css?family=Notable" rel="stylesheet">
        <style>
            body {
                
                background: #bdc3c7; /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #bdc3c7, #2c3e50); /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #bdc3c7, #2c3e50); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            }
            img {
                width:140px;
                padding: 4px;
            }
            h1, h2, p{
                text-align: center;
                font-family: 'Notable', sans-serif;
            }
            div {
                display: -webkit-inline-box;
                margin-left: 10%;
            }
        </style>
    </head>
    <body>
        <h1>Ace Poker</h1>
        <h2>Player with the more aces wins all points</h2>
        <hr/>
        <div>
        <?php
            
            echo "<h2>Player1: </h2>";
            $p1 = hand() . "<br/>";
            //echo $p1;
            
        ?>  
        </div>    
         
         <div>   
        <?php    
            echo "<h2>Player2: </h2>";
            $p2 = hand() . "<br/>";
            //echo $p2;
            
        ?>
        </div>
        <?php
            echo "<hr/>";
            
            displayWinner($p1, $p2);
        ?>
        
        
    </body>
</html>