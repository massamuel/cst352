<!DOCTYPE html>
<html>
    <head>
        <title>login for games </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        
        <style>
            h1, p, input{
                font-family: 'Bungee', cursive;
                
            }
            .btn {
                float: right;
            }
            .jumbotron{
                width: 65%;
                margin: 0 auto;
                background: snow;
                margin-top: 10%;
                
            }
            body {
                background-image: url("https://hdqwalls.com/wallpapers/miami-trees-triangle-neon-artwork-4k-7r.jpg");
                background-size:cover;
                /*background-color: #38343e;*/
            }
            #searchGames {
                background: white;
            }
            .modal-body{
                background-image: url("img/modalBack.jpg");
                color: white;
            }
            .modal-footer{
                background: white;
            }
            #attr{
                color: #e6d5e6; 
                
            }
            
        </style>
    </head>
    <body>
        <div class="center">
        <h1>Admin Login</h1>
        <br><br>
        <form action = "loginProcess.php" method="post">
            <span class="user">Username:</span> <input type="text" name="username" required /><br>
            <span class="pass">Password:</span> <input type="password" name="password" required /><br>
            
            
            <input type="submit" value="Login!">
            
        </form>
        </div>



    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Author Info</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe name="authorModal" width='450'height='200'></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    </body>
</html>