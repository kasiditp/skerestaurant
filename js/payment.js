function sendData() {
    //var test = ["gu","test","na","ka"];
    var foodName = Object.keys(cart);
    var foodAmount = [];
    for(var i = 0;i < foodName.length; i++) {
        foodAmount[i] = cart[foodName[i]];
    }
    
    var messageFood = '';
    var messageAmount = '';
    
    for(var i = 0; i < foodName.length; i++){
        var sentFoodName = 'food_name[]=' + foodName[i];        
            messageFood += sentFoodName+'&'; 
        
    }
    for(var i = 0;i< foodAmount.length; i++) {
         var sentFoodAmount = 'food_amount[]=' + foodAmount[i];
 
        if(i < foodAmount.length - 1){
          messageAmount += sentFoodAmount + '&';
        }
        else {
            messageAmount += sentFoodAmount;
        }
    }
    
    var dest = 'order_operation.php' + '?' + messageFood  + messageAmount;
    
    
    window.location.href = dest;
    
    
   
    
}

function placeMyOrder() {
    sendData();
    
    $("#content").load("thankyou.php");
    
    
}

$("#senddata").click(placeMyOrder);


//dataString = ??? ; // array?
//var jsonString = JSON.stringify(dataString);
//   $.ajax({
//        type: "POST",
//        url: "script.php",
//        data: {data : jsonString}, 
//        cache: false,
//
//        success: function(){
//            alert("OK");
//        }
//    });
