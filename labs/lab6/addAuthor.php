<?php
if(isset($_GET['addAuthorForm']))
{
    $firstName = $_GET['firstName'];
    $lastName = $_GET['lastName'];
    $dob = $_GET['dob'];
    $dod = $_GET['dod'];
    $gender = $_GET['gender'];
    $country = $_GET['country'];
    $image = $_GET['image'];
    $bio = $_GET['bio'];
    $profession = $_GET['profession'];
    
    $sql = "INSERT INTO q_author(firstName, lastName, dob, dod, country, profession, picture)
            VALUES(:firstName, :lastName, :dob, :dob, :country, :profession, :picture, :bio)";
            
    $nameParameters = array();

    $nameParameters[":username"] = $username;
    $nameParameters[":password"] = $password;
    
}


?>



<!DOCTYPE html>
<html>
    <head>
        <title> </title>
    </head>
    <body>
        <h1>ading new author</h1>
        
        <form>
            first name: <input type="text" name="firstName"/><br>
            last name: <input type="text" name="lastName"/><br>
            date of birth: <input type="text" name="dob"/><br>
            date of death: <input type="text" name="dod"/><br>
            
            Gender:
            <input type="radio" name="gender" value ="M" id="genderMale"/>
            <label for ="genderMale">Male</label>
            
            <input type="radio" name="gender" value ="F" id="genderFemale"/>
            <label for ="genderFemale">Female</label><br>
            
            Country: <input type="text" name="country"/><br>
            
            ImageURL: <input type="text" name="image"/><br>
            
            bio: <input type="text" name="bio"/><br>
            
            profession: <input type="text" name="profession"/><br>
            
            
            <input type="submit" value="Add Author"name="addAuthorForm">
        </form>

    </body>
</html>