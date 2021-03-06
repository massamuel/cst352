<?php

$animalYear = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
$animalIndex = 0;

$currentBackgroundColor = "#40b0bb3b";


$red = $_GET['red'];
$blue = $_GET['blue'];
$green = $_GET['green'];
$alpha = $_GET['alpha'];
$layout = $_GET['layout'];

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
           Homework 3.php 
        </title>
        <style type="text/css">
           
            h1 {
              font-family: sans-serif;
              color: #131313;
              background-color: #e7e5e4;
              letter-spacing: .15em;
              font-size: 50px;
     
            }
            
            #Red, #Blue, #Green, #Alpha {
                font-size: 14px;
            }
            
            #Red {
               border:solid 5px red; 
            }
            #Blue {
               border:solid 5px blue; 
            }
            #Green {
               border:solid 5px green;  
            }
            #Alpha {
               border:solid 5px black;   
            }
            #radioButtons{
                background: white;
                border:solid 1px white;
                background: white;
                border: solid 1px white;
                margin-left: 37%;
                margin-right: 38%;
                border-radius: 16px;
                margin-top: 9px;
                margin-bottom: 9px;
            }
            p {
                background-color: white;
            }
            
            input {
                font-size: 25px;
                border-radius: 7px;
            }
            
            
            
            form {
              font-family: sans-serif;
            }
            
            table {
                border: solid 1px red;
            }
        
            p {
                font-family:sans-serif;
            }
            
            body {
                text-align:center;
                <?php

                
                if($layout == 'noColorFill')
                {
                    echo "background-color:rgba($red,$green,$blue,$alpha);";
                }
                ?>
            }
            
            table {
                border: solid 1px black;
                margin:auto;
            }
            
            <?php
 
                if($layout === 'colorFill' )
                {
            ?>        
            
            td {
            <?php
                echo "background-color:rgba($red,$green,$blue,$alpha);";
            ?>
                
            }
            <?php    
                
                }
                
                else if($layout == 'noColorFill') 
                {
            ?>
            
            td {
               background-color:white; 
            }
            
            <?php
            
                
                }
            ?>
            
            
           
        </style>
    </head>
    <body>
        <h1>Table Of Olympics</h1>
        
        <br/>
        <form method="GET">
            <input type="text" placeholder="number of rows" name="rows" value="<?=$_GET['rows'] ?>">
            <input type="text" placeholder="number of rows" name="colls" value="<?=$_GET['rows'] ?>">
            <input type="submit" name="submitbtn" value="submit">
            
            <div id="radioButtons">
                <input type="radio" id="fill" name="layout" value="colorFill" <?php ($_GET['layout'] == 'colorFill' ? "checked" : "") ?>>
                <label for="colorFill"></label><label for="fill">Fill Color Cells</label>
                
                <input type="radio" id="noFill" name="layout" value="noColorFill" <?php ($_GET['layout'] == 'noColorFill' ? "checked" : "") ?> >
                <label for="noFill"></label><label for="noFill">Don't Fill Color Cells</label>
            </div>
            
            <select type="text" id="Red" name="red" >
                <option value="">Select RGB for red</option>
                <?php
                for($i = 0; $i <= 255; $i++)
                {
                    echo "<option ".checkIfSelected($i, $_GET['red'])." >$i</option>";
                }
                ?>
            </select>
            
            <select type="text" id="Blue" name="blue">
                <option value="">Select RGB for blue</option>
                <?php
                for($i = 0; $i <= 255; $i++)
                {
                    echo "<option ".checkIfSelected($i, $_GET['blue']).">$i</option>";
                }
                ?>
            </select>
            
            <select type="text" id="Green" name="green">
                <option value="">Select RGB for green</option>
                <?php
                for($i = 0; $i <= 255; $i++)
                {
                    echo "<option ".checkIfSelected($i, $_GET['green']).">$i</option>";
                }
                ?>
            </select>
            
            <select type="text" id="Alpha" name="alpha">
                <option value="">Select brigthness of rgb</option>
                <?php
                for($i = 0; $i <= 10; $i++)
                {
                    echo "<option ".checkIfSelected($i / 10, $_GET['alpha']).">".$i/10 ."</option>";
                }
                ?>
            </select>
            
            
            
        </form>
        
        <br/>

        <?php
        $numRows = $_GET['rows'];
        $numCols = $_GET['colls'];
        

        if(empty($numRows) || empty($numCols) || empty($red) || empty($blue) || empty($green) || empty($alpha))
        {
            echo "Error both input boxes and ALL 4 selection Boxes to have to be selected with number";
        }
        
        echo "<h2> Values Selected: $red $blue $green $alpha $layout</h2>";
        
        displayTable($numRows, $numCols); 
        
        ?>
    
    </body>
</html>