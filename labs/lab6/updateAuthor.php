<?php
session_start();

if(!isset($_SESSION['adminName']))
{
    header("location: index.php");
}

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function getAuthorInfo()
{
    global $dbConn;
    $sql = "SELECT * FROM q_author WHERE authorId = ". $_GET['authorId'];
    $statement = $dbConn->prepare($sql);
    $statement->execute();
    $record = $statement->fetch();
    return $record;
    
}
if(isset($_GET['updateAuthorForm']))
{
    
    
    $sql = "UPDATE q_author 
            SET firstName = :firstName, 
                lastName = :lastName, 
                gender = :gender,
                dob = :dob,
                dod = :dod,
                country = :country,
                profession = :profession,
                picture = :picture,
                bio = :bio
            WHERE authorId = ". $_GET['authorId'];
            
    $nameParameters = array();
    
    $nameParameters[":firstName"] = $_GET['firstName'];
    $nameParameters[":lastName"] = $_GET['lastName'];
    $nameParameters[":gender"] = $_GET['gender'];
    $nameParameters[":dob"] = $_GET['dob'];
    $nameParameters[":dod"] = $_GET['dod'];
    $nameParameters[":country"] = $_GET['country'];
    $nameParameters[":profession"] = $_GET['profession'];
    $nameParameters[":picture"] = $_GET['picture'];
    $nameParameters[":bio"] = $_GET['bio'];
    
    $statement = $dbConn->prepare($sql);
    $statement->execute($nameParameters);
    
    echo "author info is updated";
}



if(isset($_GET["authorId"]))
{
    $authorInfo = getAuthorInfo();
    
}




?>


<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">
    </head>
    
    <style type="text/css">
        body {
            background-color:aqua;
        }
        form {
            text-align:center;
        }
    </style>
    <body>
        
        
        
                <div class="container">
    <div class="pb-2 mt-4 mb-2 border-bottom">
        <h1>Update current author</h1>
    </div>
       update author info in form box
    </div>
        
        <form>
            
            first name: <input type="text" name="firstName" value="<?=$authorInfo['firstName']?>"/>
            </br>
            last name: <input type="text" name="lastName" value="<?=$authorInfo['lastName']?>"/>
            <br>
            date of birth: <input type="text" name="dob" value="<?=$authorInfo['dob']?>"/>
            <br>
            date of death: <input type="text" name="dod" value="<?=$authorInfo['dod']?>"/>
            <br>
            
            Gender:
            <input type="radio" name="gender" value ="M" id="genderMale" 
            
            
            <?php 
                if($authorInfo['gender'] == 'M')
                {
                    echo " checked ";
                }
            ?> 
            
            />
            <label for ="genderMale">Male</label>
            
            <input type="radio" name="gender" value ="F" id="genderFemale" <?= $authorInfo['gender'] == 'F' ? "checked" : "" ?> />
            <label for ="genderFemale">Female</label><br>
            <br>
            Country: <input type="text" name="country" value="<?=$authorInfo['country']?>"/><br>
            <br>
            ImageURL: <input type="text" name="image" size="50" value="<?=$authorInfo['picture']?>"/><br>
            <br>
            bio: <textarea type="text" name="bio" cols="50" rows="5"><?=$authorInfo['bio']?></textarea> <br>
            <br>
            profession: <input type="text" name="profession" value="<?=$authorInfo['profession']?>" /><br>
            <br>
            <input type="hidden" name="authorId" value="<?=$authorInfo['authorId']?>" /><br>
            
            
            <input type="submit" class="btn button-primary"value="Update Author"name="updateAuthorForm">
        </form>

    </body>
</html>