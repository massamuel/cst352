
<html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Lato|Raleway" rel="stylesheet">
        <title> Random Colors </title>
        <style>
            body {
                /*text-align:center;*/
                <?php
                
                    $red = rand(0,255);
                    $blue = rand(0,255);
                    $green = rand(0,255);
                    $alpha = rand(0, 10) / 10;
                    
                    echo "background-color:rgba($red,$green,$blue,$alpha);";
                ?>

            }
            h1,h2 {
                <?php
                
                    $red = rand(0,255);
                    $blue = rand(0,255);
                    $green = rand(0,255);
                    $alpha = rand(0, 10) / 10;
                    
                    echo "background-color:rgba($red,$green,$blue,$alpha);";
                    
                    $text = rand(0,1);
                    switch($text) {
                        case 0: echo "font-family: 'Lato', sans-serif;";
                            break;
                        case 1: echo "font-family: 'Raleway', sans-serif;";    
                    }
                ?>
            }
        </style>
    </head>
    <body>
        <h1>Welcome</h1>
        <form>
            <button class="btn btn-primary btn-lg"  type ="submit" value="reload Page">Reload Page</button>
            
        </form>
        

        <h2>Red: <?php echo $red ?> Blue: <?php echo $blue ?> Green: <?php echo $green ?> Alpha: <?php echo $alpha ?></h2>
    </body>
</html>