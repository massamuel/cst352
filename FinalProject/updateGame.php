<?php
session_start();

if (!isset($_SESSION['adminName'])) {
    
    header("Location: login.php");
    
}


include 'sql/vGconnection.php';
$dbConn = getConnection("vidBox");

function getAuthorInfo() {
    global $dbConn;
    
    $sql = "SELECT * FROM `videoGame` WHERE gameId = "  . $_GET['gameId'];
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $record = $stmt->fetch(PDO::FETCH_ASSOC);
    
    return $record;
    
    
}

if (isset($_GET['updateAuthorForm'])) { // User submitted the form
    
    $sql = "UPDATE `q_author` 
            SET    = :firstName,
                  lastName  = :lastName,
                  gender    = :gender,
                  dob       = :dob,
                  dod       = :dod,
                  profession= :profession,
                  country   = :country,
                  picture   = :picture,
                  bio       = :bio
              WHERE authorId = " . $_GET['authorId'];
    $np = array();
    $np[":firstName"] = $_GET['firstName'];
    $np[":lastName"]  = $_GET['lastName'];
    $np[":dob"]       = $_GET['dob'];
    $np[":dod"]       = $_GET['dod'];
    $np[":profession"] = $_GET['profession'];
    $np[":country"]    = $_GET['country'];
    $np[":picture"]    = $_GET['imageUrl'];
    $np[":bio"]        = $_GET['bio'];
    $np[":gender"]     = $_GET['gender'];
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute($np);
    
    echo "Author info was updated!";
    
}



if (isset($_GET['authorId'])) {
    
    $authorInfo = getAuthorInfo();
    //print_r($authorInfo);
    
    
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title> Update Game </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <style>
            h1, p, input{
                font-family: 'Bungee', cursive;
                
            }
            .btn {
                float: right;
            }
            .jumbotron{
                width: 65%;
                margin: 0 auto;
                background: snow;
                margin-top: 10%;
                
            }
            body {
                background-image: url("https://hdqwalls.com/wallpapers/miami-trees-triangle-neon-artwork-4k-7r.jpg");
                background-size:cover;
                /*background-color: #38343e;*/
            }
            #searchGames {
                background: white;
            }
            .modal-body{
                background-image: url("img/modalBack.jpg");
                color: white;
            }
            .modal-footer{
                background: white;
            }
            #attr{
                color: #e6d5e6; 
                
            }
            
        </style>
    </head>
    <body>
        
        <h1> Updating Author Info </h1>
        <br><br>
          <form>
            <div class="upauthor">
            <input type="hidden" name="authorId" value="<?= $authorInfo['authorId'] ?>" />
            <span class="fn">First Name:</span> <input type="text" name="firstName" value="<?= $authorInfo['firstName'] ?>" /> <br />
            <span class="ln">Last Name:</span> <input type="text" name="lastName"   value="<?= $authorInfo['lastName'] ?>"/> <br />
            <span class="gender">Gender:</span> 
            <input type="radio" name="gender" value="M" id="genderMale"  
            
              <?php
              
                 if ($authorInfo['gender'] == "M") {
                     
                     echo " checked ";
                     
                 }
              
              ?>

            />
                <label for="genderMale"><span class="male">Male</span></label>
            <input type="radio" name="gender" value="F" id="genderFemale"  <?= ($authorInfo['gender'] == "F")?"checked":"" ?> /> 
                <label for="genderFemale"><span class="female">Female</span></label><br>
            
            <span class="dob">Day of birth:</span> <input type="text" name="dob"  value="<?= $authorInfo['dob'] ?>"/> <br />
            <span class="dod">Day of death:</span> <input type="text" name="dod"  value="<?= $authorInfo['dod'] ?>"/> <br />
           <span class="countryaa"> Country:</span> <input type="text" name="country"   value="<?= $authorInfo['country'] ?>"/> <br>
           <span class="pro"> Profession:</span> <input type="text" name="profession" value="<?= $authorInfo['profession'] ?>"/> <br>
            
            <span class="url">Image URL:</span> <input type="text" name="imageUrl" value="<?= $authorInfo['picture'] ?>" size="40"/><br>
            <span class="bio">Bio:</span> 
            <textarea name="bio" cols="50" rows="5"/> <?= $authorInfo['bio'] ?> </textarea>
            
            <br>

            <input type="submit" value="Update Author" name="updateAuthorForm" />
            </div>
        </form>
        
        
        
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Author Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="authorModal" width='450'height='200'></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
        
    </body>
</html>