<?php
session_start();

if(!isset($_SESSION['adminName']))
{
    header("location: index.php");
}

if(isset($_GET['addAuthorForm']))
{
    include '../../sqlConnection.php';
    $dbConn = getConnection("quotes");
    
    
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $dob = $_GET['dob'];
    $dod = $_GET['dod'];
    $gender = $_GET['gender'];
    $country = $_GET['country'];
    $image = $_GET['image'];
    $bio = $_GET['bio'];
    $profession = $_GET['profession'];
    
    $sql = "INSERT INTO q_author(firstName, lastName, gender, dob, dod, country, profession, picture, bio)
            VALUES(:firstName, :lastName, :gender, :dob, :dod, :country, :profession, :picture, :bio);";
            
    $nameParameters = array();

    $nameParameters[":firstName"] = $firstName;
    $nameParameters[":lastName"] = $lastName;
    $nameParameters[":gender"] = $gender;
    $nameParameters[":dob"] = $dob;
    $nameParameters[":dod"] = $dod;
    $nameParameters[":country"] = $country;
    $nameParameters[":profession"] = $profession;
    $nameParameters[":picture"] = $image;
    $nameParameters[":bio"] = $bio;
    
    $statement = $dbConn->prepare($sql);
    $statement->execute($nameParameters);
    
    echo "author was added";
    
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title>Add author</title>
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
        <h1>Add new author</h1>
    </div>
       input author info in form box
    </div>
        
        <form>
            
            <input type="hidden" name="authorId"/>
            <br>
            
            first name: <input type="text" name="firstName"/>
            </br>
            last name: <input type="text" name="lastName"/>
            <br>
            date of birth: <input type="text" name="dob"/>
            <br>
            date of death: <input type="text" name="dod"/>
            <br>
            <br>
            Gender:
            <input type="radio" name="gender" value ="M" id="genderMale"/>
            <label for ="genderMale">Male</label>
            
            <input type="radio" name="gender" value ="F" id="genderFemale"/>
            <label for ="genderFemale">Female</label><br>
            <br>
            Country: <input type="text" name="country"/><br>
            <br>
            ImageURL: <input type="text" name="image" size="30"/><br>
            <br>
            bio: <textarea type="text" name="bio" cols="50" rows="5"></textarea> <br>
            <br>
            profession: <input type="text" name="profession"/><br>
            <br>
            
            <input class="btn btn-primary" type="submit" value="Add Author"name="addAuthorForm">
        </form>

    </body>
</html>