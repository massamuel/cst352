<?php
include "../../sqlConnection.php";
$dbConn = getConnection("c9");

$email = $_GET['email'];

$score = $_GET['score'];


$sql = "SELECT * FROM lab_10quiz WHERE email = ':email'";
$namedPerameters = array();
$namedPerameters[":email"] = $_GET['email'];

$stmt = $dbConn->prepare($sql);
$stmt->execute($namedPerameters);

$record = $stmt->fetch(PDO::FETCH_ASSOC);

if(empty($record))
{
    $sql = "INSERT INTO lab_10quiz (userId, email, score, attempts) VALUES(NULL, :email, :score, 1)";
    $namedPerameters[":score"] = $score;
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedPerameters);
}

echo json_encode($record);



// $sql = "INSERT INTO lab_10quiz (userId, email, score, attempts) VALUES(NULL, )";
// INSERT INTO `lab10_quiz` (`userId`, `email`, `score`, `attempts`) VALUES (NULL, 'jakePaul@youtube.com', '0', '1');

?>