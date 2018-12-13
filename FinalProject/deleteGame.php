<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}

include 'sql/vGonnection.php';
$dbConn = getConnection("vidBox");

$sql = "DELETE FROM videoGames WHERE gameId = " . $_GET['gameId'];
$stmt = $dbConn->prepare($sql);
$stmt->execute();

header("Location: index.php");







?>