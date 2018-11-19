<?php
session_start();
// $username = $_POST['username'];
// $password = $_POST['password'];



?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">
    </head>
    <style type="text/css">
        body {
            text-align:center;
            background: aqua;
        }
        #loginInfo
        {
                background-color: white;
                margin-top: 7%;
                padding-bottom: 3%;
                padding-top: 3%;
                padding-left: 0%;
                width: 50%;
                margin-left: 25%;
        }
    </style>
    <body>
        <div id="loginInfo">
            
        <h1>Admin Login</h1>
        
        <form action="loginProcess.php" method="POST">
            
            Username: <input type="text" name = "username" /><br/>
            <br/>
            Password: <input type="password" name = "password" /><br/>
            
            <input type="submit" value="login!" />
            
        </form>
        
        </div>
        <?php
        
        if($_SESSION['loginError'])
        {
            echo "<h1>Error invalid username or password</h1>";
        }
        ?>
    </body>
    
    
</html>
