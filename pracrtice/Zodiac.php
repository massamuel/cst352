<?php
    function displayYears($startYear, $endYear) {
        $animalYear = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
        $animalIndex = 0;
        
        $sum = 0;
        for($i = $startYear; $i <= $endYear; $i+=4)
        {
            
            if($i % 100 == 0)
            {
                echo"<li>Year $i <strong>Happy New Century</strong></li>";
            }
            else 
            {
              echo "<li>Year $i</li>";  
            }
            if($i == 1776)
            {
             echo"<li>Year $i  <strong>USA INDEPENDENCE</strong></li>";
            }
            $sum += $i;
            
            
            if($i >= 1900 && $i <= 2000)
            {
                if($i % 4 == 0)
                {
                   echo "<img style=\"margin-left: 20%;\" src =img/". $animalYear[$animalIndex]. ".png>";
                   echo "<hr/>";
                   $animalIndex++;
                   
                   if($animalIndex == 12)
                   {
                        $animalIndex = 0;
                   }
                }
                
                
                
                
                
                
                
            }
        }
        
        
        return $sum;
        
    }

?>


<!DOCTYPE html>

<html>
    <head>
        <title>
            
        </title>
        <style type="text/css">
        
            ul,li {
               margin-left:25%;
                
            }
        </style>
    </head>
    <body>
        <h1 style="text-align: center">Chinese Zodiak List</h1>
        
        <form>
        <input type="text" placeholder="start year" name="StartYear">
            
        <input type="text" placeholder="end year" name="endYear">
        
        <input type="submit" name="submitbtn" value="submit">
        </form>
        
        <ul>
            
            <?php
            $start = $_GET['StartYear'];
            $end = $_GET['endYear'];
            
            
            $total = displayYears($start, $end);
            echo "<h1 style=\"text-align: center\">Year Sum: $total </h1>";
            ?>
            
        </ul>
        
            
            
            
        
    </body>
</html>