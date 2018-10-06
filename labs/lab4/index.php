<?php
    $randomBackground = "Slider/img/sea.jpg";
    if(isset($_GET['keyword'])) {
      

        $layout = "horizontal";
        if(isset($_GET['layout'])) {
          $layout = $_GET['layout'];
        }
        
        include 'Slider/api/pixabayAPI.php';
        
        $keyword = $_GET['keyword'];
        
        if(!empty($_GET['Category']))
        {
          $keyword = $_GET['Category'];
          // echo "You Selected: ". $value. " ";
        }
        
        $imageURLs = getImageURLs($keyword, $layout);
        
        // $randomIndex = array_rand($imageURLs);
        
        $randomBackground = $imageURLs[array_rand($imageURLs)];
        
        
        
        //print_r($imageURLs);
        echo "Layout Selected: ". $layout;
        
        shuffle($imageURLs);
    } 
    // if(empty($_GET['keyword'])) 
    // {
    //     echo "keyword not entered nothing displayed";
    // }
    
?>

<!DOCTYPE html>

<html>
    <head>
        <title>Lab 4</title>
        
        
        
        
        <style>
            #radioButtons {
              display: inline-block;
              display: inline-block;
              text-align: left;
              background-color: #cbe8e894;
              padding-left: 1%;
              padding-right: 1%;
              border-radius: 7px;
            }
            
            body {
                background-image: url(<?= $randomBackground ?>);
                background-size:cover;
            }
            #carouselExampleIndicators {
                width: 500px;
                margin: 0 auto;
                
            }
        </style>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="Slider/css/styles.css">
    </head>
    
    <body>
      
        
        
        
        
        <form method = "GET">
            <input type="text" placeholder="keyword" size="15" name="keyword" value="">
            <div id="radioButtons">
              <input type="radio" id="lhorizontal" name="layout" value="Horizontal"
              
              <?php 
                if($_GET['layout'] == "Horizontal")
                {
                  echo "checked";
                }
              ?>>
              
              
              <label for="Horizontal"></label><label for="lhorizontal">Horizontal</label>
              <br/>
              
              <input type="radio" id="lvertical" name="layout" value="Vertical"
              <?=(($_GET['layout'] == "Vertical")? "checked": "")?> >
              <label for="Vertical"></label><label for="lvertical">Vertical</label>
            </div>
            
            <select name = "Category">
                <option value="">Selection</option>
                <option>Sea</option>
                <option>Forest</option>
                <option>Mountain</option>
                <option>Snow</option>
                <option>Sky</option>
            </select>
            
            <input type="submit" name="submitbtn" value="submit">
        </form>
        
        <?php
        
        if(isset($keyword) && !empty($keyword)) 
        {
        
        ?>
        
        <br/>
        
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <!--<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>-->
            <?php
              for($i = 0; $i < 10; $i++)
              {
                echo $i == 0 ? "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"$i\" class=\"active\"></li>" : "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";  
                
              }
            
            ?>
            
          </ol>
          <div class="carousel-inner">
            
            <div class="carousel-item active">
              <img class="d-block w-100" src="<?= $imageURLs[0]?>" alt="First slide">
            </div>
            <?php
              for($i = 1; $i < 10; $i++)
              {
              echo "<div class=\"carousel-item\">";
              echo "<img class=\"d-block w-100\" src=\"" .$imageURLs[$i]."\" alt=\"Second slide\">";
              echo "</div>";
              }
            
            ?>
            
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        
        
        
        
        <?php
        
        }
        else 
        {
        
        echo "<h2>Type a Keyword to Display a slideshow with random images from pixabay</>";
        
        }
        
        
      ?>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>