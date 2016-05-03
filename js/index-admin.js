function userClick () {

    $("#userbar").addClass("active");
    $("#content-admin").load("user-admin.php");
    $("#foodbar").removeClass("active");
    $("#salebar").removeClass("active");
    $("#sellamountbar").removeClass("active");
}

function foodClick() {

    $("#foodbar").addClass("active");
    $("#userbar").removeClass("active");
    $("#salebar").removeClass("active");
    $("#sellamountbar").removeClass("active");
    $("#content-admin").load("food-admin.php");

}

function orderClick() {

    $("#foodbar").removeClass("active");
    $("#userbar").removeClass("active");
    $("#salebar").addClass("active");
    $("#sellamountbar").removeClass("active");
    $("#content-admin").load("order-admin.php");
  }

function sellAmountClick(){
  $("#foodbar").removeClass("active");
  $("#userbar").removeClass("active");
  $("#salebar").removeClass("active");
  $("#sellamountbar").addClass("active");
  $("#content-admin").load("chart.html");
}

$("#userlink").click(userClick);
$("#foodlink").click(foodClick);
$("#salelink").click(orderClick);
$("#sellamountlink").click(sellAmountClick);
