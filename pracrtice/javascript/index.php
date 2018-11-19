<?php
session_start();

$days = $_SESSION['deliveryMethod'];
$cost = $_SESSION['totalCharged'];
?>

<!DOCTYPE html>
<html>
    <head>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <style>
            html{
                text-align: center;
            }
            table {
                margin: auto;
            }
            
        </style>
        
    </head>
    <body>
        <div class="jumbotron">
        <h1>Holiday Shopping</h1>
        </div>
        <br>
        
        
        <h2>Cart</h2>
        <table border="1" cellpadding= 1>
            <tr>
                <th>Product </th>
                <th>Unit Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
            <tr>
                <td>Fruit Cake</td>
                <td>$30</td>
                <td> <input id="totalItem1" type="text"> </td>
                <td id="itemTotal1"></td>
            </tr>
            
            <tr>
                <td>Pinata(medium size)</td>
                <td>$20</td>
                <td> <input id="totalItem2" type="text"> </td>
                <td id="itemTotal2"></td>
            </tr>
            
            <tr>
                <td>Shipping</td>
                <td></td>
                <td> </td>
                <td id="shippingCost"></td>
            </tr>
            
            <tr>
                    <!--products + shipping-->
                <td>Subtotal</td>  
                <td></td>
                <td> </td>
                <td id="subTotal"></td>
            </tr>
            
            <tr>
                <td>tax(10%)</td>
                <td></td>
                <td> </td>
                <td id="tax"></td>
            </tr>
            
            <tr>
                <td>total</td>
                <td></td>
                <td> </td>
                <td id="fullTotal"></td>
            </tr>            
            
        </table>
        
        <h2>Shipping and handling</h2>
        
        <form action="confirm.php" method="GET">
        <input type="radio" name="deliveryMethod" value=15 >Next-Day delivery: $15.00 </input> <br>
        <input type="radio" name="deliveryMethod" value=10>Three-Day delivery: $10.00</input> <br>
        <input type="radio" name="deliveryMethod" value=5 checked>Regular shipping(5-8 days): $5.00</input> <br>
        <br>
 
        
        <input type="button" id="calcChange" name="recalculate" value="Recalculate Total"> <br><br>
        
        <input type="checkbox" name="agreement" value="agree"> I agree to terms of this purchase </input> 
        
        <br>
        <br>
        
        <input type="hidden" name="totalCharged" id="totalCharged">
        
        <p id="noAgree"></p>
        
        
        <input  type="submit" name="submitbtn" value="CONFIRM PURCHASE" <?php ($_GET['agreement'] =="checked" ? "" : "disabled") ?> ></input>
        </form>
        
        
        <script type="text/javascript" src="index.js"></script>
    </body>
</html>