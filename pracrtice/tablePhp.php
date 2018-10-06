<?php

$animalYear = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
$animalIndex = 0;

function displayTable($rows, $cols)
{
    global $animalYear;
    global $animalIndex;
    $year = 2020;
    
    echo "<table border=\"1\" cellpadding=\"4\" cellspacing=\"1\">";
    
    for($i = 0; $i < $rows; $i++)
    {
        echo "<tr>";
        
        for($j = 0; $j < $cols; $j++)
        {
            echo "<td> <img src=img/".$animalYear[$animalIndex].".png> <p>Year $year</p></td>";
            $animalIndex++;
            if($animalIndex == 12)
            {
                $animalIndex = 0;
            }
            
            $year+=4;
        }
        
        echo "</tr>";
    }
    echo "</table>";
    
    
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
        <style type="text/css">
            body {
                text-align:center;
            }
            table {
                border: solid 1px black;
                margin:auto;
            }
           
        </style>
    </head>
    <body>
        <h1>Table Of Olympics</h1>
        
        <br/>
        <form method="GET">
            <input type="text" placeholder="number of rows" name="rows">
            <input type="text" placeholder="number of rows" name="colls">
            <input type="submit" name="submitbtn" value="submit">
        </form>
        
        <br/>
        
        
        
        <?php
        $numRows = $_GET['rows'];
        $numCols = $_GET['colls'];
        
        
        
        if(empty($numRows) || empty($numCols))
        {
            echo "<h2>ERROR: BOTH input boxes to have to be filled with number</>";
        }
        
        displayTable($numRows, $numCols); 
        
        ?>
    
    </body>
</html>