<?php 
$name = $_POST['Name'];
?>

<!DOCTYPE html>

<html>
    <body>
        
        <form method="POST">
            <input type="text" placeholder="What is your name?" name="Name">
            <input type="submit" name="submit" value="Submit">
        </form>
        
        <h1>Hello <?php echo $name?></h1>
    </body>
</html>