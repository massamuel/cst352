<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AJAX: Sign Up Page</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script>
        
          $("document").ready( function(){

               $("#zipCode").change( function(){
                   
                   //alert($("#zipCode").val());
                   
                    $.ajax({
                    
                    type: "GET",
                    url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
                    dataType: "json",
                    data: { "zip": $("#zipCode").val() },
                    success: function(data,status) {
                        
                        $("#city").text(data.city);
                        $("#latitude").text(data.latitude);
                        $("#longitude").text(data.longitude);
                        $("#State").text(data.state);
                    },
                    complete: function(data,status) { //optional, used for debugging purposes
                    //alert(status);
                    }
                    
                    });//ajax
                   
                   
                   
                   
               } );//
               
               $('#state').change(function() {
                   $.ajax({
                       type: "GET",
                       url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php?",
                       dataType: "json",
                       data: {"state": $("#state").val() },
                       success: function(data,status) {
                           $("#county").html("");
                           for(var i = 0; i < data.length; i++)
                           {
                               $("#county").append("<option>"+data[i].county+"</option>");
                           }
                           
                       },
                       complete: function(data,status) {
                           
                       }
                   });//end of ajax call
               });
               
               $('#user').change(function() {
               
                   $.ajax({
                           type: "GET",
                           url: "checkusername.php",
                           dataType: "json",
                           data: {"username": $("#user").val() },
                           success: function(data,status) {
                               if(data == false)
                               {
                                   $("#userError").html("username avalable").css("color", "green");
                               } 
                               else {
                                   
                                   $("#userError").html("Username already taken").css("color", "red");
                               }
                               
                           },
                           complete: function(data,status) {
                               
                           }
                       });//end of ajax call
              
               });
          });//document.ready
        
        
        
            function validateForm() {
                var validationConfirmation = true;
                var username= $("#user").val();
                var password = $("#password").val();
                var pass2 = $("#passType").val();
                if (username.length < 5){
                    //alert("username must be at least 5 characters");
                    $("#userError").html("username must be at least 5 characters");
                    validationConfirmation = false;
                    
                };
                if(password.length < 3)
                {
                    $("#passwordError").html("Password must have a minimum of 3 characters");
                    validationConfirmation = false;
                }
                
                if (password != pass2) {
                    $("#retypedError").html("Password and retyped password must be the same");
                    validationConfirmation = false;
                    
                }
                
                
                return validationConfirmation;
           
            }
            
            
            
        </script>
        <style type="text/css">
            .error{
                color:red;
            }
            body {
                text-align:center;
            }
            form {
                background:#c6d8d84a;
            }
        </style>

    </head>

    <body>
       <div class='jumbotron'>
       <h1> Sign Up Form </h1>
       </div>
    
        <form onsubmit="return validateForm()" action="sucess.php" >
            <fieldset>
               <legend>Sign Up</legend>
                First Name:  <input type="text" name="firstName"><br> 
                Last Name:   <input type="text" name="lastName"><br> 
                Email:       <input type="text"><br> 
                Phone Number:<input type="text"><br><br>
                Zip Code:    <input id="zipCode" type="text">
                <br>
                <p>City: <span id="city"></span><p>
                
                <p>Latitude: <span id="latitude"></span></p>
                
                <p>Longitude: <span id="longitude"></span></p>
                
                <p>State: <span id="State"></span></p>
                <select id="state">
                    <option value="">Select One</option>
                    <option value="ca"> California</option>
                    <option value="ny"> New York</option>
                    <option value="tx"> Texas</option>
                    <option value="va"> Virginia</option>
                </select><br />
                
                Select a County: <select id="county">
                    
                </select><br>
                
                Desired Username: <input id="user" name="username" type="text"><span id="userError" class="error"></span><br>
                
                Password: <input id="password" name="password" type="password"><span id="passwordError" class="error"></span><br>
                
                Type Password Again: <input  id="passType" type="password"><span id="retypedError" class="error"></span><br>
                
                <input type="submit" name="submitUser" value="Sign up!">
            </fieldset>
        </form>
    
    </body>
</html>