<?php

include '../sqlConnection.php';


$dbConn = getConnection("quotes");

function displayQuotesL() {
    global $dbConn;
    $sql = "SELECT quote FROM `q_quotes` WHERE quote LIKE 'L%' ";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    //$records = $statement -> fetch();
    $records = $statement -> fetchAll();
    
    
    foreach($records as $record) {
        echo $record['quote'] ."<br>";
    }
}

function displayFithLargestQuote() {
    global $dbConn;
    $random = rand(0,26);
    
    $sql = "SELECT LENGTH(quote), firstName, lastName, quote FROM q_quotes NATURAL JOIN q_author ORDER BY LENGTH(quote) DESC LIMIT 5,1";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    //$records = $statement -> fetch();
    $records = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($records as $record) {
        echo $record['firstName'] . ": " . $record['lastName'] . "<br>" . $record['quote'] ."<br>". $record['LENGTH(quote)'] . "<br>";
        
    }
}


function displayMaleQuotes() {
    global $dbConn;
    $random = rand(0,26);
    
    $sql = "SELECT firstName, lastName, country FROM `q_author` WHERE gender = 'M' AND country != 'USA' ORDER BY lastName ASC";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    //$records = $statement -> fetch();
    $records = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($records as $record) {
        echo $record['firstName'] . " " . $record['lastName'] . " " . $record['country'] . "<br>";
        
    }
}

function displayPhilosphyQuotes() {
    global $dbConn;
    $random = rand(0,26);
    
    $sql = "SELECT quote FROM `q_quotes` NATURAL JOIN q_cat_quote WHERE categoryId = 5";
    $statement = $dbConn->prepare($sql);
    $statement -> execute();
    //$records = $statement -> fetch();
    $records = $statement -> fetchAll(PDO::FETCH_ASSOC);
    
    
    foreach($records as $record) {
        echo $record['quote'] . "<br>";
        
    }
}

?>


<!DOCTYPE html>
<html>
    <head>
        
    </head>
    <body>
        <h1>Project 2 SQL</h1>
        
        <?php 
        
        displayQuotesL();
        echo "<br>";
        
        displayMaleQuotes();
        
        echo "<br>";
        
        displayFithLargestQuote();
        
        echo "<br>";
        
        displayPhilosphyQuotes();
        
        
        ?>
        
        
          
  <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>All quotes that start with letter "L", in descending order </td>
      <td width="20" align="center">10</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>First name, last name and country of all male authors who were not born in the USA, ordered by last name</td>
      <td width="20" align="center">15</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>Author, Quote, and Quote length of the current fifth longest quote in the table</td>
      <td width="20" align="center">15</td>
    </tr>     
     <tr style="background-color:#99E999">
       <td>4</td>
       <td>All quotes in the "Philosophy" category, ordered alphabetically </td>
       <td align="center">15</td>
     </tr>
     <tr style="background-color:#99E999">
      <td>6</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>     
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>    


        
        
    </body>
</html>