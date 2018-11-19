<?php
    include '../../sqlConnection.php';
    $dbConn = getConnection("quotes");
    
    $username = $_GET['username'];
    
    $sql = "SELECT * FROM q_admin WHERE username = :username";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute(array(":username"=>$username));
    $record = $stmt->fetch();
    
    
    echo json_encode($record);
    

?>