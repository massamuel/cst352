<?php
    $arena = range(1,4);
    $teams = range(1,4);
    
    function displayArena() 
    {
      global $arena;
      shuffle($arena);
      for($i = 0; $i < count($arena) - 1; $i++)
      {
        if($i % 2 == 0)
        {
          $arenaName = array_pop($arena);
        }
        
      }
      
      echo "img/stadium/stadium$arenaName.jpg";
    }
    
    function showTeams()
    {
      global $teams;
      shuffle($teams);
      $str;
      
      for($i = 0; $i < count($teams) - 1; $i++)
      {
        if($i % 2 == 0)
        {
          $teamName = array_pop($teams);
        }
      }
      switch($teamName) {
        case 1: $str = "Celtics";
            break;
        case 2: $str = "Warriors";
            break;
        case 3: $str = "Rockets";
            break;
        case 4: $str = "Cavs";
            break;
      }
      echo "<h2 class='team'>$str</h2>";
      echo "<img src='img/jersey/jersey$teamName.jpeg'/>";
    }
    
    
    

?>

<!DOCTYPE html>
<html lang="en-US">
    
    <head>
        <link rel="stylesheet" type = "text/css" href="css/styles.css">
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
        <title>Homwork3</title>
        
        
        <style type="text/css">
            body {
              background-image: url( <?php displayArena(); ?>); 
              background-size: cover;
              text-align: center;
              
            }
            h1 {
              text-align: center;
              color: white; 
              font: bold 52px Helvetica, Arial, Sans-Serif;
              text-shadow: 1px 1px #fe4902, 2px 2px #fe4902, 3px 3px #fe4902;
            }
            img {
              width: 30%;
            }
            h2 {
             font-family: 'Bungee', cursive;
             border: solid 1px white;
             background-color:white;
             margin: auto;
             width: 30%;
             font-size: 50px;
            }
            .row {
              display: inline-flex;
              width: 220%;
              margin-left: -24%;
            }
            .col-lg-4 {
              width: 33.333333%;
            }
            
        </style>
        
    </head>
    
    <body>
      
        <h1>Final Possibilities</h1>
        <button onClick="window.location.reload()">Whos In the Finals</button>
        
        <div class="row">
          
          <div class="col-lg-4"> 
              <?php
              
              showTeams();
              ?>
          </div>  
          
          <div class="col-lg-4">  
              <?php
              
              showTeams();
              ?>
           </div> 

        </div>
    </body>
    
</html>

<!--
use two arrays to acces image file and name of file in images

use bootstrap and create a grid that displays a random value

use arrays to display background images 

in text images and use css for styling 




-->