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

$_SESSION['loginError'] = false;
if(empty($record)) {
    $_SESSION['loginError'] = true;
    header("location: index.php");
    
}
else {
    
    $_SESSION['adminName'] = $record['firstName'] . " " . $record['lastName'];
    
    header("location: main.php");
    
}


?>