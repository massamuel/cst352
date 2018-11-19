<?php
session_start();

$_SESSION['submitbtn'];

$days = $_GET['deliveryMethod'];
$cost = $_GET['totalCharged'];

function displayDays() {
    global $days;
    $newDay = "";
    
    switch($days) {
        case $days == 15:
            $newDay = "Next Day";
        break;
        
        case $days == 10:
            $newDay = "3 Days";
            break;
            
        case $days == 5:
            $newDay = "5-8 Days";
            break;

    }
    echo $newDay;
}


?>

<!DOCTYPE html>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <style type="text/css">
        html{
            text-align: center;
        }
    </style>
    <body>
        <div class="jumbotron">
        <h1>Holiday Shopping</h1>
        </div>
        <br>
        
        <h1>Confirmed purchase</h1>
        <h2>Your order will be dilivered to you in <?= displayDays(); ?></h2>
        
        <h2>Your credit card will be charged $<?= $cost ?></h2>
        
        <!--<form method="GET" action="index.php">-->
        <!--    <input  type="submit" name="submitbtn" value="View order">-->
        <!--</form>-->
    </body>
</html>

