<?php



function play() {
    $winner = "";
    $rock = "rock";
    $paper = "paper";
    $scissors = "scissors";
    
    
    $img1; $img2;

    $player1 = rand(0,2);
    $player2 = rand(0,2);
    
    switch($player1) {
        case 0: $img1 = $rock;
            break;
        case 1: $img1 = $paper;
            break;
        case 2: $img1 = $scissors;
            break;
    }
    
    switch($player2) {
        case 0: $img2 = $rock;
            break;
        case 1: $img2 = $paper;
            break;
        case 2: $img2 = $scissors;
            break;
    }
    
    
    
    echo "<div><h2>player1</h2><br/><img style='width:50%;height:50%;' src='rps/$img1.png'><br/></div>";
    
   
    echo "<div><h2>player2</h2><br/><img style='width:50%;height:50%;' src='rps/$img2.png'><br/></div>";
    
    if($player1 == $player2) {
        $winner = "Tie";
    }
    else if($player1 == $rock && $player2 == $scissors || $player1 == $paper && $player2 == $rock || $player1 == $scissors && $player2 == $paper) {
        $winner = "Player1";
    } else {
        $winner = "player2";
    }
    
    if($winner != "Tie") {
        echo "<h1>Winner: $winner</h1>";
    } else {
        echo "<h1>$winner</h1>";
    }
    
    
    
}

?>



<!DOCTYPE html>
<style type="text/css">
    .btn:hover {
        background-color:#86b9e0;
    }
    body {
        text-align: center;
    }
    img {
       
    }
    div {
        
        display: inline-block;
        vertical-align: top;
        text-align: center;
}
    
</style>
<html lang="en-US">
    <head>
       <meta charset="UTF-8">
       <title>Rock Paper Scissors</title>
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        
        
        <button class="btn btn-outline-primary" name="Refreash" value="Refresh Page" onClick="window.location.reload()">Rock,Paper,Scissors</button>
        
         <br/>
        <br/>
     
              <?php
              play();
              ?>
            

        
        
    </body>
</html>