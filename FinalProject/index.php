<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
        
        <title>
            Game Search DB 
        </title>
        <style>
            h1, p, input{
                font-family: 'Bungee', cursive;
                
            }
            .btn {
                float: right;
            }
            .jumbotron{
                width: 65%;
                margin: 0 auto;
                background: snow;
                margin-top: 10%;
                
            }
            body {
                background-image: url("http://hdqwalls.com/wallpapers/miami-trees-triangle-neon-artwork-4k-7r.jpg");
                background-size:cover;
                /*background-color: #38343e;*/
            }
            #searchGames {
                background: white;
            }
            
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <h1>Game Nation</h1>
            <p>Find Games, Search Games, Get Games</p>
            <hr>
            <form action="result.php" >
            <input id="searchGames" class="form-control" name="gameSearch" type="text" placeholder="Search Game Database" onekeyup="showgameQuery()"/>
            </form>
            <br>
            <br>
            
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="submitbtn" value="submit">
    
        </div>
        
        <script type="text/javascript" src="js/function.js"></script>
    </body>
</html>