<?php 

session_start();

if(!isset($_SESSION['adminName']))
{
    header("location: index.php");
}

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

$sql = "DELETE FROM q_author WHERE authorId = ". $_GET['authorId'];

$statement = $dbConn->prepare($sql);
$statement->execute();

header("location: main.php");    


?>