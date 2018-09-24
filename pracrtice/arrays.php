
<!DOCTYPE html>
<html>
    <head>
        <title>Revie arrays</title>
        
        
    </head>
    <body>
        <?php
            $symbols = array("orange", "seven");
            array_push($symbols, "lemon","bar", "cherry");
            // print_r($symbols);
            $symbols[] = "grapes";
            
            dispay();
            function dispay() 
            {
                global $symbols;
                
                $size = count($symbols);

                
                echo "<img src='../labs/lab2/img/".$symbols[rand(0, $size - 1)].".png'>";
      
                
            }
        ?>
    </body>
</html>