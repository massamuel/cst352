<?php 
session_start(); // starts or resumes a sessions

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");


$username = $_POST['username'];
$password = sha1($_POST['password']);




$sql = "SELECT * FROM q_admin WHERE username = '$username' AND password = '$password'";

$sql = "SELECT * FROM q_admin WHERE username = :username AND password = :password";

$nameParameters = array();

$nameParameters[":username"] = $username;
$nameParameters[":password"] = $password;



$statement = $dbConn ->prepare($sql);
$statement->execute($nameParameters);
$record = $statement->fetch(PDO::FETCH_ASSOC);

if(empty($record)) {
    echo "Error incorrect username or password";
}
else {
    
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
    
    header("location: main.php");
    
}


?>