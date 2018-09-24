<?php 
    $deck = range(1,52);
    $suit = array("clubs", "diamonds","hearts", "spades");
    shuffle($deck);
    
    
    function hand() {
        global $suit;
        global $deck;
        for($i = 0; $i < 5; $i++)
        {
            $cardValue = array_pop($deck) % 13;
            
            if($cardValue == 1)
            {
               echo "<img style='border: solid 4px yellow' src='cards/".$suit[rand(0, count($suit) - 1)]."/$cardValue.png'"; 
            }
            if($cardValue == 0)
            {
                $cardValue = 13;
            }
            echo "<img src='cards/".$suit[rand(0, count($suit) - 1)]."/$cardValue.png'/>";
            
        }
    } 
    
    function displayCards()
    {
        global $suit;
        
        
        for($i = 1; $i <= 5; $i++) 
        {
            $card = rand(1,13);
            if($card == 1)
            {
                echo "<img style='border: solid 4px yellow' src='cards/".$suit[rand(0, count($suit) - 1)]."/$card.png'";
            }
            echo "<img src='cards/".$suit[rand(0, count($suit) - 1)]."/$card.png'/>";
            
        }
        
    }

?>
<!DOCTYPE html>
<html lang = "en-US">
    <head>
        <meta charset="UTF-8">
        <title>Lab 3</title>
        
        <style>
            h1,h2,body {
                text-align: center;
            }
            img {
                width:140px;
                padding: 4px;
            }
        </style>
    </head>
    <body>
        <h1>Ace Poker</h1>
        <h2>Player with the more aces wins all points</h2>
        <?php
            // displayCard();
            echo "Player1: ";
            hand() . "<br/>";
            
            
            echo "<hr/>";
            
            
            echo "Player2: ";
            hand() . "<br/>";
        ?>
    </body>
</html>