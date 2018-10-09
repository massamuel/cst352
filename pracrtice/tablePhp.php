<?php

$animalYear = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
$animalIndex = 0;

$currentBackgroundColor = "#40b0bb3b";

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
                    global $ranA, $ranG;
                    global $red, $blue, $green, $alpha;
                    global $numRows, $numCols, $layout;
                    
                    if(empty($numRows) || empty($numCols) &&empty($layout))
                    {
                        if(isset($_GET['red']) && isset($_GET['blue']) && isset($_GET['green']) && isset($_GET['alpha']))
                        {
                            echo "background-color:rgba($red,$blue,$green,$alpha);";
                        }
                        else 
                        {
                            echo "background-color:rgba($ranG,$ranG,$ranG,$ranA);";
                        }
                    }
                ?>
    
                
            }
            table {
                border: solid 1px black;
                margin:auto;
            }
            td {
                <?php
                global $red, $blue, $green, $alpha;
                $ranG = rand(1,255);
                $ranA = rand(0,10)/10;
                
                $layout = $_GET['layout'];
                
                if($layout == 'colorFill')
                {
                    
                    if(!empty($_GET['red']) && !empty($_GET['blue']) && !empty($_GET['green']) && !empty($_GET['alpha']))
                    {
                       echo "background-color:rgba($red,$green,$blue,$alpha);";
                    }
                    else 
                    {
                        echo "background-color:rgba($ranG,$ranG,$ranG,$ranA);";
                    }

                }
                
            
 
                ?>
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
            
            <div id="radioButtons">
                <input type="radio" id="fill" name="layout" value="colorFill">
                <label for="colorFill"></label><label for="fill">Fill Color Cells</label>
                
                <input type="radio" id="noFill" name="layout" value="noColorFill" checked>
                <label for="noFill"></label><label for="noFill">Don't Fill Color Cells</label>
            </div>
            
            <select type="number" id="Red" name="red">
                <option value="">Select RGB for red</option>
                <?php
                for($i = 1; $i <= 255; $i++)
                {
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            
            <select type="number" id="Blue" name="blue">
                <option value="">Select RGB for blue</option>
                <?php
                for($i = 1; $i <= 255; $i++)
                {
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            
            <select type="number" id="Green" name="green">
                <option value="">Select RGB for green</option>
                <?php
                for($i = 1; $i <= 255; $i++)
                {
                    echo "<option>$i</option>";
                }
                ?>
            </select>
            
            <select type="number" id="Alpha" name="alpha">
                <option value="">Select brigthness of rgb</option>
                <?php
                for($i = 0; $i <= 10; $i++)
                {
                    echo "<option>".$i/10 ."</option>";
                }
                ?>
            </select>
            
            
            
        </form>
        
        <br/>
        
        
        
        <?php
        $numRows = $_GET['rows'];
        $numCols = $_GET['colls'];
        
        $red = $_GET['red'];
        $blue = $_GET['blue'];
        $green = $_GET['green'];
        $alpha = $_GET['alpha'];
        
        
        
        
        if(empty($numRows) || empty($numCols))
        {
            echo "<h2>ERROR: BOTH input boxes to have to be filled with number changing background Color</>";
        }
        
        displayTable($numRows, $numCols); 
        
        ?>
    
    </body>
</html>