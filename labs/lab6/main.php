<?php
session_start();

if(!isset($_SESSION['adminName']))
{
    header("location: index.php");
}

include '../../sqlConnection.php';
$dbConn = getConnection("quotes");

function displayAllAuthors() {
    global $dbConn;
    $sql = "SELECT authorId, firstName, lastName, country FROM q_author ORDER BY lastName ASC";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    $records = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($records as $record) {
        
        echo "<a class='btn btn-primary' role='button' href='updateAuthor.php?authorId=".$record['authorId']."'>update</a> ";
        echo "<form action='deleteAuthor.php' onsubmit='return confirmDelete(".$record['authorId'].")'>";
        echo " <input type='hidden' name='authorId' value='".$record['authorId']."'>";
        echo " <button class='btn btn-outline-danger' type ='submit'>Delete</button>";
        echo "</form>";
        echo "<a onclick='openModal()' target='authorModal' href='authorInfo.php?authorId=".$record["authorId"]."'> ".$record["firstName"] . " " . $record['lastName'] ."</a>". "  ";
        
        echo  $record['country'] . "<br><br>";
    }
    
}
?>


<!DOCTYPE html>
<html>
    <head>
        <title>admin section</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">
    
    <script>
        function confirmDelete(authorId)
        {
            
            var confirmId = prompt('to confirm delete enter author id:' + authorId);
            if(confirmId == authorId)
            {
                return true;
            }
            return false;
            
        }
        function openModal()
        {
            $('#myModal').modal("show"); 
        }
        
    </script>
    </head>
    <style type="text/css">
        body {
            background-color: aliceblue;
        }
    
        form {
            display: inline-block;
        }
        .container {
            text-align:center;
        }
        btn-toolbar, pull-right {
            
            flex-direction: row-reverse;
        }
        .container {
            margin-top:2%;
            width: 100%;
            height: 100%;
            

        }
        .welcomeText {
            padding-left: 52%;
        }
        #containerForauthors {
            background-color: white;
            padding-top: 3%;
            width: 46%;
            padding-left: 5%;
            margin-left: 29%;
        }
        
    </style>
    <body>
        
        <!--<h1>Admin Section</h1>-->
        
        <div class="container">
            <div class='page-header'>
        <div class='btn-toolbar pull-right'>
            
            <div class='btn-group'>
        <form action="addAuthor.php">
            <input class='btn btn-outline-danger' type="submit" name="addAuthor" value="add new author"/>
        </form>
        
        <form action="logout.php">
            <input class='btn btn-primary' role='button'  type="submit" name="logout" value="logout"/>
        </form>
            
        
            </div>
            <h2 class="welcomeText">Welcome <?= $_SESSION['adminName']; ?></h2>
        </div>
         

        </div>
        </div>
        
        
        <hr>
        <br>
        


        
        <br />
        <br />
        <div id="containerForauthors">
        <?= displayAllAuthors(); ?>
        </div>
        

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Author Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="authorModal" width="450" height="200"></iframe>
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