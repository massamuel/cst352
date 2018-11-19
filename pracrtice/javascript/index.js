$("document").ready(function() {

    $("#calcChange").click( function(){
        
        var totalitem1 = $("#totalItem1").val() * 30;
        var totalitem2 = $("#totalItem2").val() * 20;
        
        var shippingCost = parseInt($('input[name=deliveryMethod]:checked').val());
        
        $("#itemTotal1").text("$" + totalitem1);
        $("#itemTotal2").text("$" + totalitem2);
        
        var subTotal = totalitem1 + totalitem2 + shippingCost;

        
        
        $("#subTotal").text("$" + subTotal);
        
        $("#shippingCost").text("$" + shippingCost);
        
        var totalTaxed = (subTotal * .10);
        var total = totalTaxed + subTotal;
        var roundedTotal = total.toFixed(2);
        
        $("#tax").text("$" + totalTaxed);
         
        $("#fullTotal").text("$" + roundedTotal);
        
        $("#totalCharged").val(total.roundedTotal);
        
        
    });
    
    
    if($('input[name=agreement]').is(':checked')) {
        $("#noAgree").html("");
        
    }
    else 
    {
        $("#noAgree").text("You must agree tot terms before confirming purchase").css("color", 'red');
        
    }
});
