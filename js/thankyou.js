function onEnterPage() {
    var key_array = Object.keys(cart);
    
    var inject = "";
    
    var paidBy = "Cash";
    
    inject+="<td id = \"thankyou_order_summary\">";
    for(var i = 0; i<key_array.length; i++) {
        inject += "("+cart[key_array[i]]+") " + key_array[i] + "<br>";
    }
    inject+="</td>";
    
    $("#thankyou_order_summary").replaceWith(inject);
    
    inject = "";
    
    inject+= "<td id = \"thankyou_order_totalprice\">";
    inject+= "Paid by : " + paidBy + "<br>";
    inject+= "Total price : "+ mainTotalPrice + " Baht.<br>";
    
    $("#thankyou_order_totalprice").replaceWith(inject);
    
//    console.log("At Thankyou : "+mainTotalPrice);
    
    inject = "";
    
    inject += "<b id = thankyou_phonenumber>" + user_info.phone_number + "</b>";
    
    $("#thankyou_phonenumber").replaceWith(inject);
    
    cart = {};
    mainTotalPrice = 0;
    console.log(cart);
}

onEnterPage();