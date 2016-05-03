

// var oReq = new XMLHttpRequest(); //New request object
//     oReq.onload = function() {
//         //This is where you handle what to do with the response.
//         //The actual data is found on this.responseText
//         alert(this.responseText); //Will alert: 42
//     };
//     oReq.open("get", "login.php", true);
//     //                               ^ Don't block the rest of the execution.
//     //                                 Don't wait until the request finishes to
//     //                                 continue.
//
//     oReq.send();

// var isFailLogIn = false;
// if(isFailLogIn){
//   alert(isFailLogIn);
// } else {
//   alert("hello");
// }
$(document).ready( function() {

    $('.gallery-item').hover( function() {
        $(this).find('.img-title').fadeIn(300);
    }, function() {
        $(this).find('.img-title').fadeOut(100);
    });

});


function submitClick(){
  if(($('#pwd').val() == $('#conpwd').val())&&$('#pwd').val() !== '') {
    console.log("Submit complete");

  }
}

function checkClick() {

}

function checkUser() {
  console.log("Implement Check User");

}

$('#submit_action').click(submitClick);
$('#usr').focusout(checkUser);

//Change content

$("#content").load("home.html");

//menu
function menuClick(){
   $("#content").load("menu.html");
   $("#menubar").addClass("active");
   $("#homebar").removeClass("active");
   $("#orderbar").removeClass("active");
}
$("#menulink").click(menuClick);

//home
function homeClick(){
  $("#content").load("home.html");
  $("#menubar").removeClass("active");
  $("#homebar").addClass("active");
  $("#orderbar").removeClass("active");
}
$("#homelink").click(homeClick);
//Order

function orderClick(){
  $("#content").load("order.html");
  $("#menubar").removeClass("active");
  $("#homebar").removeClass("active");
  $("#orderbar").addClass("active");
}

function settingClick() {

  console.log($("#username_tag").text());
  console.log(user_info.firstName);
  console.log(user_info.lastName);
  console.log(user_info.address);
  console.log(user_info.e_mail);
  console.log(user_info.phone_number);

  $("#setting_usr").val($("#username_tag").text());
    $("#newfst").val(user_info.firstName);
    $("#newlst").val(user_info.lastName);
    $("#new_address").val(user_info.address);
    $("#new_email").val(user_info.e_mail);
    $("#newtel").val(user_info.phone_number);
}

$("#orderlink").click(orderClick);
$("#setting").click(settingClick);
