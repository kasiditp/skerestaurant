
//html script
function myorderClick() {
    $("#inside-content").load("myorder.html");
    $("#detail_top").removeClass("active");
    $("#payment").removeClass("active");
    
    
}

$("#inside-content").load("myorder.html");


function detailClick() {
    if(!($("#detail_top").hasClass("disabled"))){
        $("#inside-content").load("detail.html");
        $("#detail_top").addClass("active");
        $("#myorder").removeClass("active");
        $("#payment").removeClass("active");
  }
}

function paymentClick() {
    if(!($("#payment").hasClass("disabled"))) {
        
        $("#inside-content").load("payment.html");
        $("#detail_top").removeClass("active");
        $("#myorder").removeClass("active");
        
    }
    
}

//Default

$("#detail_top").click(detailClick);
$("#myorder").click(myorderClick);
$("#payment").click(paymentClick);

//End of html script




