function paymentClick() {
    $("#inside-content").load("payment.html");
    $("#detail_top").removeClass("active");
    $("#payment").addClass("active");
    $("#payment").removeClass("disabled");
    
}

function backtomyorderClick() {
    $("#inside-content").load("myorder.html");
    $("#myorder").addClass("active");
    $("detail_top").removeClass("active");
}

function refresh() {
    console.log("Detail Refresh");
    
    
    $("#detail_firstname").val(user_info.firstName);
    $("#detail_lastname").val(user_info.lastName);
    $("#detail_email").val(user_info.e_mail);
    $("#detail_phonenum").val(user_info.phone_number);
    $("#detail_address").val(user_info.address);
    
   
    
}

$("#backtomyorder").click(backtomyorderClick);
$("#topayment").click(paymentClick);
refresh();