<?php
session_start();
?>



<!DOCTYPE html>
<html>
    <head>
        <title>
            
        </title>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
            
            $(document).ready(function() {
               $("#submitRate").click(function(event) {
                   var radiobutton = $("input[name=rating]:checked").val();
            
                //  $("#submitRate").attr("disabled", true);
                    console.log("Radio Value");
                    console.log(radiobutton);
                    
                    $.ajax({
                       type: "GET",
                       url: "addRating.php",
                       dataType: "json",
                       data: {"rating": radiobutton},
                       success: function(data,status) {
                        //   console.log(data[0]);
                        
                        $("#average").html(data[0]);
                        $("#displayer").show();
                           
                       },
                       complete: function(data,status) {
                           
                       }
                   });//end of ajax call
               });
               
            });
            
        </script> 
    </head>
    <body>
        <h1>Rate Video </h1>
        
        <iframe width="560" height="315" src="https://www.youtube.com/embed/pjhJUfUaYT0" 
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
        allowfullscreen></iframe>
        <br>
        <br>
        
        One<input type="radio" name="rating" class="radioBtn" value="1">
        
        Two<input type="radio" name="rating" class="radioBtn" value="2">
        
        Three<input type="radio" name="rating" class="radioBtn" value="3">
        
        Four<input type="radio" name="rating" class="radioBtn" value="4">
        
        <input type="submit" id="submitRate" name="submitbtn" value="Rate!">
    
        <br>
        <br>
        
        <h1 id="displayer" hidden>Average Score Is: <span id="average"> </span></h1>
        
        
    </body>
</html>