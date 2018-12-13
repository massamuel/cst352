<?php

    include '../../sqlConnection.php';
    $dbConn = getConnection("reviews");
    
    $rating = $_GET['rating'];
    
    $sql = "INSERT INTO ratings(rateId, rating)
            VALUES(NULL, :rating);";
    
    $nameParameters = array();

    $nameParameters[":rating"] = $rating;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($nameParameters);
    
   
    $sql = "SELECT ROUND(AVG(rating),2) AS avgRating FROM ratings";
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $rateAVG = $stmt->fetch();
    
    
    
    echo json_encode($rateAVG);
    

?>