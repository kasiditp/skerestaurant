<?php
session_start();
?>
<html>
<head>
  <title>SKEresturants</title>
  <link rel="icon" href="image/ske_icon.ico"  />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/container-fluid.css"> -->
  <link rel="stylesheet" href="css/font.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" rel="stylesheet"></script>
  <script src="js/login.js"></script>
  <script type = "text/javascript">
  var cart = {};
  var totalFood = 0;
  var food_name = <?php echo json_encode($_SESSION["food_name"]); ?>;
  var food_price = <?php echo json_encode($_SESSION["food_price"]); ?>;
  var food_amount = <?php echo json_encode($_SESSION["food_amount"]);?>;
  var user_info_arr = <?php echo json_encode($_SESSION["user_info"]); ?>;
  var mainTotalPrice = 0;

  var user_info = {
    firstName : user_info_arr[0],
    lastName : user_info_arr[1],
    address : user_info_arr[2],
    e_mail : user_info_arr[3],
    phone_number : user_info_arr[4]
  };

  console.log(food_name);
  console.log(food_price);
  console.log(food_amount);
  console.log(user_info_arr);
  console.log(user_info);
  </script>
</head>
<body>
  <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">SKEresturant</a>
      </div>


      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active" id="homebar"><a href="#" id="homelink">Home</a></li>
          <li id="menubar"><a href="#" id="menulink">Menu</a></li>
          <li id="orderbar"><a href="#" id="orderlink">Order</a></li>
          <!-- <li id="contactbar"><a href="#" id="contactlink">Contact</a></li> -->
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <!-- Shopping cart icon -->
          <li class="dropdown" >
            <a class="dropdown-toggle" id="linkCart">
              <i class="glyphicon glyphicon-shopping-cart">
                <span class="badge" id="numberCart"> 0 </span>
              </i>
            </a>
            <ul class="dropdown-menu"  id="menuCart">
              <li><p> You have added <h4 id="nameCart"></h4></p></li>
            </ul>
          </li>
          <!-- Username -->
          <li class="dropdown">

            <a class="dropdown-toggle" data-toggle="dropdown"><b id = "username_tag"><?php
            //include 'login.php';
            echo $_SESSION["username"];
            ?></b><span class="caret"></span></a>
            <ul id = "setting-dp" class="dropdown-menu">
              <li>
                <div class="row">
                  <div class="col-md-12">
                    <div class="bottom text-center">
                      <button type ="button" class="btn btn-info" data-toggle = "modal" data-target = "#settingModal" id="setting">Setting</button>
                    </div>
                    <div class="bottom text-center">
                      <form action="index.html">
                        <button type="summit" class="btn btn-danger">Logout</button>
                      </form>
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </li>
        </ul>

      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>



  <div class="container col-md-12" id="content" style="background-color : white">

  </div>
  <br><br>
  <div class="footer-body">
    <div class = "well">
      <div class = "row" >

        <div class="col-md-4">
          <h4>Made By</h4>
          Arut Thanomwatana 5710546437
          <br>
          Kasidit Phoncharoen 5710546151
          <br>
          Patchara Pattiyathanee 5710546348
        </div>
        <div class="col-md-4">
          <h4>Jump To</h4>
          <li><a href="index.html">Home</a> </li>
          <li class="active"><a href="#">Menu</a> </li>
          <li><a href="#">Order</a> </li>
          <li><a href="#">Contact Us</a> </li>
        </div>
        <div class="col-md-4">
          <h4>Follow Us</h4>
          <a href = "https://www.facebook.com"><button type="button" class="btn btn-primary">Facebook</button></a>
          &nbsp;
          &nbsp;

          <a href = "https://www.twitter.com"><button type="button" class="btn btn-primary">Twitter</button></a>
        </div>

      </div>
    </div>
  </div>

  <!-- Modal Setting-->
  <div id="settingModal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Setting</h4>
        </div>

        <div class="modal-body">


          <!--          <form class="form-horizontal" role="form"  method = "post" action = "registration.php" id = "register_action">-->
          <form class="form-horizontal" role="form">
            <div class="form-inline">
              <div class="form-group">
                <div class="col-sm-8">
                  <label for="usr">Username:</label>
                  <input type="text" class="form-control " id="setting_usr" name = "username" disabled>
                </div>
                <br>&nbsp

                <!--                <button type="button" class="btn btn-warning">Check </button>-->

              </div>
            </div>
            <div class="form-inline">
              <div class="form-group">
                <div class="col-sm-8">
                  <label for="newpwd">New password:</label>
                  <input type="password" class="form-control" id="newpwd" name = "newPassword">
                </div>
              </div>
              &thinsp;
              <div class="form-group">
                <div class="col-sm-8">
                  <label for="newconpwd">Confirm new password:</label>
                  <input type="password" class="form-control" id="newconpwd" name = "new_confirm_password">
                </div>
              </div>
            </div>
            <div class="form-inline">
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="newfst">First name:</label>
                  <input type="text" class="form-control" id="newfst" name = "new_first_name">
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <label for="newlst">Last name:</label>
                  <input type="text" class="form-control" id="newlst" name = "new_last_name">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-8">
                <label for="new_address">New address:</label>
                <textarea class="form-control" rows="3" style="resize:none" id="new_address" name = "new_address"></textarea>
              </div>
            </div>
            <div class="form-inline">
              <div class="form-group">
                <div class="col-sm-6">
                  <label for = "new_email">New e-mail:</label>
                  <input type = "email" class = "form-control" id="new_email" name = "new_email">
                </div>
              </div>
              &nbsp;
              &nbsp;
              &nbsp;
              &thinsp;
              <div class="form-group">
                <div class="col-sm-6">
                  <label for = "newtel"> Number:</label>
                  <input type = "tel" class = "form-control" id="newtel" name = "new_phone_number">
                </div>
              </div>
            </div>
            <br>

            <div class="modal-footer">
              <button type="submit" class="btn btn-success" id = "new_submit_action">Submit</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </div>

  <script src="js/index.js">  </script>
  <script src="js/login.js">  </script>

</body>

</html>
