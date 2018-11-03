<?php
$countryNorway = array("alesund", "bergen", "hammerfest", "oslo", "stavanger","trondheim");
$countryMexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco","mexico_city");

$reversedNorway = rsort($countryNorway);
$reversedMexico = array_reverse($countryMexico);
$cindex = 0;

$selectCountry = $_GET['countyToVisit'];
$tableRows = $_GET['citiesTable'];
$orderDisplayed = $_GET['orderOfCountry'];

$imageDisplayed = $_GET['displayImage'];

function displayTable()
{
    global $countryNorway, $countryMexico, $selectCountry, $tableRows, $orderDisplayed, $cindex, $imageDisplayed;
    
    if($orderDisplayed == 'zA')
    {
        rsort($countryNorway);
        rsort($countryMexico)
    }


    
    echo "<table border=\"1\" cellpadding=\"4\" cellspacing=\"1\">";
    
    for($i = 0; $i < $tableRows/2; $i++)
    {
        echo "<tr>";
        
        for($j = 0; $j < 2; $j++)
        {
            if($imageDisplayed == 'Displayed') 
            {
                if($selectCountry == 'both')
                {
                    if($j % 2 != 0)
                    {
                        echo "<td> <img src=img/".$countryNorway[$cindex].".png> <p>".$orderDisplayed == 'Za' ? $reversedNorway[$cindex] : $countryNorway[$cindex]."</p> </td>";
                        $cindex++;
                    }
                    else
                    {
                        echo "<td> <img src=img/".$countryMexico[$cindex].".png> <p>".$orderDisplayed == 'Za' ? $reversedMexico[$cindex] : $countryMexico[$cindex]."</p></td>";
                        $cindex++;
                    }
                }
                
                if($selectCountry == 'norway')
                {
                        echo "<td> <img src=img/".$countryNorway[$cindex].".png> <p>".$countryNorway[$cindex]."</p></td>";
                        $cindex++;
                }
                if($selectCountry == 'mexico')
                {
                        echo "<td> <img src=img/".$countryMexico[$cindex].".png> <p>".$countryMexico[$cindex]."</p></td>";
                        $cindex++;
                }
            }
            else 
            {
                
                if($selectCountry == 'both')
                {
                    if($j % 2 != 0)
                    {
                        echo "<td> <p>".$countryNorway[$cindex]."</p></td>";
                        $cindex++;
                    }
                    else
                    {
                        echo "<td> <p>".$countryMexico[$cindex]."</p></td>";
                        $cindex++;
                    }
                }
                
                if($selectCountry == 'norway')
                {
                        echo "<td>  <p>".$countryNorway[$cindex]."</p></td>";
                        $cindex++;
                }
                if($selectCountry == 'mexico')
                {
                        echo "<td> <p>".$countryMexico[$cindex]."</p></td>";
                        $cindex++;
                }
                
            
            }
            
        }
        
        echo "</tr>";
    }
    echo "</table>";
    
    
}

function checkIfSelected($i, $getMethod)
{
    if($i == $getMethod)
    {
        return "selected";
    }
}


?>

<!DOCTYPE html>
<html>
    <head>
        <title>
           Project1.php 
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">
        <style type="text/css">
        
            table {
                margin-left:40%;
            }
            body {
                text-align: center;
            }
            .errorMessage {
                color:red;
            }
        </style>
    </head>
    <body>
        <div class="jumbotron">
        <h1>TableOf countries</h1>
        </div>
        
        <br/>
        <form method="GET">
            <input type="text" placeholder="number of cities to visit" name="citiesTable" value="<?=$_GET['citiesTable'] ?>">
            
            <input type="submit" name="submitbtn" value="submit">
            
            <div id="radioButtons">
                Country To Visit:
                <input type="radio" id="mex" name="countyToVisit" value="mexico" <?php ($_GET['countyToVisit'] == 'mexico' ? "checked" : "") ?>>
                <label for="countyToVisit"></label><label for="mex">Mexico</label>
                
                <input type="radio" id="nor" name="countyToVisit" value="norway" <?php ($_GET['countyToVisit'] == 'norway' ? "checked" : "") ?> >
                <label for="countyToVisit"></label><label for="nor">Norway</label>
                
                <input type="radio" id="both" name="countyToVisit" value="both" <?php ($_GET['countyToVisit'] == 'both' ? "checked" : "") ?> >
                <label for="countyToVisit"></label><label for="both">Or Both</label>
            </div>
            
            <div id="radioButtonsTwo">
                Order of Countries:
                <input type="radio" id="a" name="orderOfCountry" value="aZ" <?php ($_GET['orderOfCountry'] == 'aZ' ? "checked" : "") ?>>
                <label for="orderOfCountry"></label><label for="">A-Z</label>
                
                <input type="radio" id="z" name="orderOfCountry" value="Za" <?php ($_GET['orderOfCountry'] == 'Za' ? "checked" : "") ?> >
                <label for="orderOfCountry"></label><label for="">Z-A</label>
                
            </div>
            display Image:
            <input type="radio" id="imageDisplayed" name="displayImage" value="Displayed" <?php (($_GET['displayImage']) == "Displayed" ? "checked" : "") ?>>
            <label for="imageDisplayed"></label><label for="imageDisplayed"></label>
        
        </form>
        
        <br/>
        <hr/>
        
        <?php
        if($tableRows < 2 || empty($tableRows))
        {
            echo "<h1 class='errorMessage'>Error Table can not be less than 2</h1>";
        }
        else if(($tableRows > 6) && ($selectCountry == 'mexico' || $selectCountry == 'norway'))
        {
            echo "<h1 class='errorMessage'>Error Table can not be greater than 6 if only one country is Selected</h1>";
        }
        else if($tableRows > 12 && $selectCountry == 'both')
        {
            echo "<h1 class='errorMessage'>Error Table can not be greater than 12 when both contries are selected</h1>";
        }
        else 
        {
            if($selectCountry == 'both')
            {
               echo "<h2>visiting $tableRows cities in both Mexico and Norway</h2>"; 
            }
            else 
            {
                echo "<h2>visiting $tableRows cities in ".($selectCountry == 'mexico' ? "Mexico" : "Norway" )."</h2>";
            }
            displayTable();
        }
        
        ?>
        
        
        
    <table border="1" width="600">
    <tbody><tr><th>#</th><th>Task Description</th><th>Points</th></tr>
    <tr style="background-color:#99E999">
      <td>1</td>
      <td>The page includes the form elements as the Program Sample: checkbox, radio buttons, etc.</td>
      <td width="20" align="center">5</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>2</td>
      <td>Error is displayed if Number of Cities is not submitted.</td>
      <td width="20" align="center">5</td>
    </tr> 
    <tr style="background-color:#99E999">
      <td>3</td>
      <td>Error is displayed if Number of Cities is less than 2 or left blank </td>
      <td align="center">5</td>
    </tr>    
   <tr style="background-color:#99E999">
      <td>4</td>
      <td>Error is displayed if Number of Cities is greater than 6 AND only one country is selected, or if size is greater than 12 AND country is "Both" </td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>5</td>
      <td>Header is displayed with info submitted (number of cities and country to visit) </td>
      <td align="center">5</td>
    </tr>    
	<tr style="background-color:#99E999">
      <td>6</td>
      <td>The right number of random cities is displayed when selecting Mexico or Norway as Country </td>
      <td align="center">15</td>
    </tr> 
   	<tr style="background-color:#99E999">
      <td>7</td>
      <td>If selecting "Both" as Country, there must be at least ONE city of each country</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>8</td>
      <td>The names are ordered alphabetically as chosen by the user (asc/desc)</td>
      <td align="center">10</td>
    </tr>
    <tr style="background-color:#99E999">
      <td>9</td>
      <td>City images are displayed if corresponding checkbox is checked</td>
      <td align="center">10</td>
    </tr>       
    <tr style="background-color:#99E999">
      <td>10</td>
      <td>Cities are displayed in a two-column table</td>
      <td align="center">15</td>
    </tr>  
    <tr style="background-color:#99E999">
      <td>11</td>
      <td>The web page uses Bootstrap and has a nice look. </td>
      <td align="center">5</td>
    </tr>        
    <tr style="background-color:#99E999">
      <td>12</td>
      <td>This rubric is properly included AND UPDATED (BONUS)</td>
      <td width="20" align="center">2</td>
    </tr>   
     <tr>
      <td></td>
      <td>T O T A L </td>
      <td width="20" align="center"><b></b></td>
    </tr> 
  </tbody></table>
        
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>

  
    

