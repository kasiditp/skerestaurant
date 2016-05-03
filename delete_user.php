<?php
    session_start();
    $id = $_GET['id'];
    $_SESSION["page"] = 1;

    $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
    $db = mysql_select_db("SKErestaurant") or die("Couldn't find database");

    
    $banned = mysql_query("UPDATE Users SET type = 0 WHERE 
    username = '$id' ");
     
    
    if($banned){
        header("Location: skerestaurant-admin.php");
    }

?>