<!--
// //session_start();

// include 'sql/vGconnection.php';
// $conn = dbConnection("vidBox");

// function displaySearchResults(){
//     global $conn;
    
//     if(isset($_GET['submitbtn'])){
//         echo "<h3>Products found </h3>";
//         $namedParameters = array();
        
//         $sql = "SELECT * FROM videoGames WHERE 1";
        
//         if(!empty($_GET['gameSearch'])){
//             $sql = " AND title LIKE :title";
//             $namedParameters[":title"] = "%" . $_GET['gameSearch'] . "%";
//         }
        
//         $stmt = $conn->prepare($sql);
//         $stmt->execute();
//         $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
        
//         foreach ($records as $record) {
//             echo $record["title"] . " " . $record["genre"] . "<br>";
//         }
        
//     }
// }
    
// -->
<!DOCTYPE html>
<html>
    <head>
        
        <meta charset="utf-8">
  
        <link href="https://fonts.googleapis.com/css?family=Bungee" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
        
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        
    
        <link href="https://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet"></link>
        
        
        
        
        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

        
        
        <title>
            Game Search DB 
        </title>
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
            
        </style>
    </head>
    <body>
        <div class="jumbotron">
            <h1>Game Nation</h1>
            <p>Find Games, Search Games, Get Games</p>
            <hr>
            <form action="result.php" >
                
            </form action="result.php">
            <input class="searchGames" class="form-control" name="gameSearch" type="text" placeholder="Search Game Database" onsubmit="showgameQuery()"/>
            </form>
            <br>
            <br>
            
            <input class="btn btn-primary btn-lg btn-light" type="submit" name="submitbtn" value="submit">
            <form>
        </div>
            
        
        <script>
            $(document).ready(function() {
               <script>
  $( function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    $( "#tags" ).autocomplete({
      source: availableTags
    });
  } );
  </script>
               
            });
        </script>
    </body>
</html>