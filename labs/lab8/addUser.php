<?php
session_start();

if(isset($_GET['submitUser']))   
{
    include '../../sqlConnection.php';
    $dbConn = getConnection("quotes");
    
    $username = $_GET['username'];
    $password = $_GET['password'];
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    
    
    
     $sql = "INSERT INTO q_admin(adminId, firstName, lastName, username, password)
            VALUES(NULL, :firstName, :lastName, :username, SHA1(:password));";
    
    // INSERT INTO `q_admin` (`adminId`, `firstName`, `lastName`, `username`, `password`) 
    // VALUES (NULL, 'alice ', 'otter', 'aotter', SHA1('otterAlice'));
            
    $nameParameters = array();

    $nameParameters[":firstName"] = $firstName;
    $nameParameters[":lastName"] = $lastName;
    $nameParameters[":username"] = $username;
    $nameParameters[":password"] = $password;
           
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($nameParameters);
    
}
    
    
    

?>