
var temp = 0;

$("#content").click(function(){
  console.log("Body"+temp);
  if(temp === 0){
    $("#menuCart").hide();
  }
  temp = 0;
});
function createOrderClick(i,food) {

  return function() {
    console.log("temp : "+temp);
    totalFood++;
    $("#numberCart").text(totalFood);
    $("#nameCart").text($(food).text());
    $("#menuCart").show();
    temp = 1;

    var putFood = $(food).text();
    var username = $("#username_tag").text();

    if($("#username_tag").text()!=="") {
      if(putFood in cart) {
        cart[putFood] = cart[putFood] + 1;
      }
      else {
        cart[putFood] = 1;
      }
      // alert("You order " + putFood);
    }
    else {
      alert("Please Login");
    }


  };
}

for(var i = 1; i<=12; i++) {
  var order = "#menu_button_"+i;
  var food = "#TextFood"+i;
  $("#price"+i).text(food_price[i-1]+"฿");
  $(order).click(createOrderClick(i,food));
}
// for(var i = 2; i <= 12 ; i++){
//   console.log(i);
//   $('#menu_button_'+i).click(orderClick);
// }
