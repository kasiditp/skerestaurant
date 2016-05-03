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

        var total_sell_amount = <?php echo json_encode($_SESSION["total_sell_amount"]); ?>;
        console.log(total_sell_amount);
        var user_info_arr = <?php echo json_encode($_SESSION["user_info"]); ?>;

        var user_info = {
            firstName : user_info_arr[0],
            lastName : user_info_arr[1],
            address : user_info_arr[2],
            e_mail : user_info_arr[3],
            phone_number : user_info_arr[4]};

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
        <a class="navbar-brand" href="skerestaurant-admin.php">SKEresturant</a>
      </div>


      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li id="userbar"><a href="#" id="userlink">Users</a></li>
          <li id="foodbar"><a href="#" id="foodlink">Food</a></li>
          <li id="salebar"><a href="#" id="salelink">Order Received</a></li>
          <li id="sellamountbar"><a href="#" id="sellamountlink">Sell Amount</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">

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
                                <button type ="button" class="btn btn-info" data-toggle = "modal" data-target = "#settingModal" >Setting</button>
                                </div>
                                <div class="bottom text-center">
                                  <form action="index.html">
                                    <button type="submit" class="btn btn-danger">Logout</button>
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

  <div class="container-fluid" id="content-admin">
        <h1>Admin Page</h1>
        <p>Please select the menu.</p>
  </div>

   <script src="js/index-admin.js"></script>
   <script type = "text/javascript">
   var fromPage = <?php echo
      json_encode($_SESSION["page"]); ?>;


        if(fromPage == 1){
          $("#content-admin").load("user-admin.php");
        }
        else if(fromPage == 2){
          $("#content-admin").load("food-admin.php");
        }
        else if(fromPage == 3) {
          $("#content-admin").load("order-admin.php");
        }
   </script>
    </body>
</html>
