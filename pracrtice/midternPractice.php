<?phpMyAdmin
$alphabet = range("A", "Z");
$randLetter = rand("A", "Z");

$findLetter = $_GET['findLetter'];
$omitLetter = $_GET['omitLetter'];
$tableSize = $_GET['TableSize'];

function displayTable() {
    
    global $alphabet, $randLetter, $findLetter, $tableSize, $omitLetter;
    
    echo "<table border=\"1\" cellpadding=\"4\" cellspacing=\"1\">";
    
    for($i = 0; $i < $tableSize; $i++)
    {
        echo "<tr>";
        
        for($j = 0; $j < $tableSize; $j++)
        {
            if($randLetter[$j] == $omitLetter)
            {
                continue;
            }
            echo "<td> <h2>".$randLetter[$j]."</h2> </td>";
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
            
        </style>
    </head>
    
    <body>
        <h1>Find a Letter</h1>
        <form method="GET">
            <p>Select Letter to find</p>
            <select name="findLetter">
                <?php
                for($i = 0; i < 26; $i++)
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
            
            <select name="omitLetter">
                <?php
                for($i = 0; i < 26; $i++)
                {
                    echo "<option>".$alphabet[$i]."</option>";
                }
                
                
                ?>
            </select>
            
            <input type="submit" name="submitbtn" value="submit"/>
        </form>
        
        
        
    </body>
</html>