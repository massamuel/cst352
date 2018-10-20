<?php 
session_start();

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");


$username = $_POST['username'];
$password = sha1($_POST['password']);




$sql = "SELECT * FROM q_admin WHERE username = '$username' AND password = '$password'";


// echo $sql;

$statement = $dbConn ->prepare($sql);
$statement->execute();
$record = $statement->fetch(PDO::FETCH_ASSOC);

if(empty($record)) {
    echo "Error incorrect username or password";
}
else {
    
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
    
    header("location: main.php");
    
}


?>