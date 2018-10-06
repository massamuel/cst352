<?php 
$name = $_POST['Name'];
?>

<!DOCTYPE html>

<html>
    <head>
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    </head>
    <body>
        <div ng-app="">
            <p>Name: <input type="text" ng-model="name"></p>
            <h1>Hello {{name}}</h1>
            
        </div>
        
        <form method="POST">
            <input type="text" placeholder="What is your name?" name="Name">
            <input type="submit" name="submit" value="Submit">
        </form>
        
        <h1>Hello <?php echo $name?></h1>
    </body>
</html>