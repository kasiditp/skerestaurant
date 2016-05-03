//Myorder script


function createDecreaseClick(i,amount,price) {
    return function() {
         if (parseInt($(amount).val()) > 1) {
//             var oneUnit = parseInt($(price).text())/parseInt($(amount).val());
            var key_array = Object.keys(cart);
             cart[key_array[i]] = cart[key_array[i]] -1;

             $(amount).val(parseInt($(amount).val()) - 1);
            totalFood--;
             $("#numberCart").text(totalFood);
//             $(price).text(parseInt($(price).text())-oneUnit);
             refresh();
            }
    };

}

function createIncreaseClick(i,amount,price) {
    return function() {
//        var oneUnit = parseInt($(price).text())/parseInt($(amount).val());
        var key_array = Object.keys(cart);
        console.log(cart[key_array[i]]);
        var indexOf = food_name.indexOf(key_array[i]);
       if (parseInt($(amount).val())<food_amount[indexOf]){

             cart[key_array[i]] = cart[key_array[i]] + 1;
            totalFood++;
            $("#numberCart").text(totalFood);

        $(amount).val(parseInt($(amount).val()) + 1);
//        $(price).text(parseInt($(price).text()) + oneUnit);
        refresh();
        
       }
    };
}

function createRemoveClick(i) {
    return function() {
        var key_array = Object.keys(cart);
        var cfm = confirm("Are you sure you want to delete "+key_array[i]+"?");
        if(cfm === true){
            totalFood = totalFood - cart[key_array[i]];
            $("#numberCart").text(totalFood);
             delete cart[key_array[i]];
            refresh();
        }

    };
}

function detailClick() {

    $("#inside-content").load("detail.html");
     $("#detail_top").addClass("active");
    $("#detail_top").removeClass("disabled");
    $("#myorder").removeClass("active");
}

function morefoodClick() {
    $("#content").load("menu.html");
    $("#myorder").addClass("active");
    $("#detail_top").removeClass("active");
    $("#orderbar").removeClass("active");
    $("#menubar").addClass("active");
}



function refresh() {
    console.log("Refresh");

    var inject = "";
    var totalInject = "";
    var totalPrice = 0;
    inject+= "<tbody id = \"order_table\">";

    var key_array = Object.keys(cart);

    for(var i = 0;i<key_array.length;i++){

        var ordering_index = key_array.indexOf(key_array[i]);

        var price = parseInt(food_price[ordering_index]*cart[key_array[i]]);

        totalPrice+=price;

        inject += "<tr class = \"text-center\"> ";
        inject += "<td>" + key_array[i] + "</td>";
        inject += "<td id = \"quantity\"><div class = \"form-inline\"> ";
        inject += "<button class = \"plusminus btn btn-default\"";
        inject += " id = \"decrease_quantity" + i + "\">-</button><input class = \"form-";
        inject += "control\" type = \"text\" size = \"2\" value = \""+cart[key_array[i]]+"\" id = \"amount" + i + "\" disabled>";
        inject += "<button class = \"plusminus btn btn-default\" id = \"increase_quantity" + i + "\">+</button>";
//        inject += "<a id = \"remove_item_" + i + " class = \"remove\"> Remove</a>";
        inject += "<button id = \"remove_item" + i + "\"> Remove</button>";
        inject += "</div></td>";
        inject += "<td><a id = \"price" + i + "\">" + price + "</a> Baht</td>";
//        inject += "<td><a id = \"price\">" + 1 + "</a> Baht</td>";

        inject += "</tr>";

    }

    inject += "</tbody>";


    $("#order_table").replaceWith(inject);
    totalInject+="<div id = \"totalprice\"><b>Your Total : " + totalPrice + " Baht.</b>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</div>";
    $("#totalprice").replaceWith(totalInject);

    for(var i = 0; i < key_array.length ; i++){
       var decrease = "#decrease_quantity"+i;
       var increase = "#increase_quantity"+i;
       var amount = "#amount"+i;
        var price = "#price"+i;
        var remove = "#remove_item"+i;

        console.log(remove);


       $(decrease).click(createDecreaseClick(i,amount,price));
       $(increase).click(createIncreaseClick(i,amount,price));
       $(remove).click(createRemoveClick(i));

   }
    mainTotalPrice = totalPrice;
    console.log(mainTotalPrice);



}




$("#detail_bottom").click(detailClick);
$("#more_food").click(morefoodClick);


//$("#decrease_quantity0").click(decreaseQuantityClick);
//$("#increase_quantity0").click(increaseQuantityClick);


//$("#decrease_quantity0").click(decreaseQuantityClick);
//window.onload(refresh);
//$("#order_refresh").click(refresh);
//End of Myorder script

refresh();
