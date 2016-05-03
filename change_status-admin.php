<?php

session_start();
$id = $_GET['id'];
$_SESSION["page"] = 3;

$connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
$db = mysql_select_db("SKErestaurant") or die("Couldn't find database");


$deliver = mysql_query("UPDATE BillSummary SET status = 1 WHERE buy_code = '$id' ");


if($deliver){
    header("Location: skerestaurant-admin.php");
}


?>
