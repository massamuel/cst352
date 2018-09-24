<!DOCTYPE html>
<html lang="en-US">
    <head>
       <meta charset="UTF-8">
       <title>Lucky number</title>
       
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    </head>
    <body>
        
        
        <h1>My Lucky Number Is: <?php $ranD = rand(1,10); if($ranD == 4){echo 11;} else{ echo $ranD;}  ?></h1>
        <button class="btn btn-outline-primary" name="Refreash" value="Refresh Page" onClick="window.location.reload()">refresh page</button>
    </body>
</html>
