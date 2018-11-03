<?php
$alphabet = range("A", "Z");
// $letterIndex = range(1,26);

$findLetter = $_GET['findLetter'];
$omitLetter = $_GET['omitLetter'];
$tableSize = $_GET['TableSize'];

function displayTable() {
    
    global $alphabet, $findLetter, $tableSize, $omitLetter;
    
    $tableLetter = array();
    
    $positionFindLetter = rand(1, ($tableSize * $tableSize));
    
    shuffle($alphabet);
    
    
    for($i = 0; $i < ($tableSize * $tableSize); $i++)
    {
        $randLetter = rand(1, 26);

        if($i == $positionFindLetter && $positionFindLetter == $randLetter)
        {
            $tableLetter[$i] = $findLetter;
        }
        
        while($alphabet[$randLetter] == $omitLetter && $i == $positionFindLetter)
        {
            $randLetter = rand(1, 26);
            
        }
        
        $tableLetter[$i] = $alphabet[$randLetter]; 
        
        
    }
    
    

    $color = "blue";

    
    echo "<table border=\"1\" cellpadding=\"4\" cellspacing=\"1\">";
    $index = 0;
    for($i = 0; $i < $tableSize; $i++)
    {
        echo "<tr>";
        
        for($j = 0; $j < $tableSize; $j++)
        {
            if($tableLetter[$index] <= 'H')
            {
                $color = "red";
            }
            
            else if($tableLetter[$index] > 'H' && $tableLetter[$index] < 'P')
            {
                $color = "green";
            }
            
            echo "<td> <h2 style='color:$color'>". $tableLetter[$index] ."</h2> </td>";
            $index++;
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
        

    </head>
    
    <body>
        <h1>Find a Letter</h1>
        <form method="GET">
            
            <p>Select Letter to find</p>
            
            <select name="findLetter">
                <?php
                for($i = 0; $i < 26; $i++)
                {
                    echo "<option>".$alphabet[$i]."</option>";
                }
                
                ?>
            </select>
            <br/>
            
            <p>Select Table Size</p>
            <select name="TableSize">
                <option value="6">6x6</option>
                <option value="7">7x7</option>
                <option value="8">8x8</option>
                <option value="9">9x9</option>
                <option value="10">10x10</option>
            </select>
            <br/>
            
            <p>Select Letter to Omit</p>
            <select name="omitLetter">
                <?php
                for($i = 0; $i < 26; $i++)
                {
                    echo "<option>".$alphabet[$i]."</option>";
                }
                
                
                ?>
            </select>
            
            <input type="submit" name="submitbtn" value="submit"/>
        </form>
        
        
        
        <?php 
            if($findLetter == $omitLetter)
            {
                echo "<h3>Error letter for omitting and letter to find cannot be same selection.</h3>";
            }
            else 
            {
                echo "Omitting Letter" . $omitLetter . " Finding letter " . $findLetter;
                displayTable(); 
            }
    
        
        
        ?>
        
    </body>
</html>