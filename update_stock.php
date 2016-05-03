<?php
    session_start();
  $id = $_GET['id'];
  $amount = $_GET['amount'];
  $_SESSION["page"] = 2;
    $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
                        
    mysql_select_db("SKErestaurant") or die("Couldn't find database");

    $update = mysql_query("UPDATE Stock SET amount = '$amount' WHERE food_id = '$id'   ");

    

    if($update){
       header("Location: skerestaurant-admin.php");
    }
    


?>