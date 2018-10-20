<?php
$username = $_POST['username'];
$password = $_POST['password'];



?>

<!DOCTYPE html>
<html>
    <head>
        
    </head>
    
    <body>
        
        <h1>Admin Login</h1>
        
        <form action="loginProcess.php" method="POST">
            Username: <input type="text" name = "username" /><br/>
            Password: <input type="password" name = "password" /><br/>
            
            <input type="submit" value="login!" />
            
        </form>
        
    </body>
    
    
</html>
