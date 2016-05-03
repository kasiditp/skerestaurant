<?php
    session_start();
    
    $food_name = $_GET['food_name'];
    $food_amount = $_GET['food_amount'];
    $username = $_SESSION["username"];
    $buy_code = substr(md5(uniqid(mt_rand(), true)) , 0, 8);
    
    
    if(count($food_name) != 0 && count($food_amount) != 0){
        
        $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
        $db = mysql_select_db("SKErestaurant") or die("Couldn't find database");
        
        $result_price = 0;
        
        $_SESSION["buy_code"] = $buy_code;
        $get_customer_id = mysql_query("SELECT customer_id FROM Users WHERE username = '$username' ");
        $customer_id = mysql_result($get_customer_id,0);
        
        for($i = 0; $i < count($food_name); $i++){
            $name = $food_name[$i];
            $amount = $food_amount[$i];
            
            echo "amount : " . $amount . " name : " . $name;
            
            $temp  = mysql_query("SELECT food_id,price FROM Stock WHERE food_name = '$name'");
            $id    = mysql_result($temp,0,0);
            $price = mysql_result($temp,0,1);
            
            
            $total_price = $price * $amount ;
            $query = "INSERT INTO OrderLog (customer_id,food_id,amount,total_price,buy_code) VALUES 
                        ('$customer_id','$id','$amount','$total_price','$buy_code') ";
            $order_operation = mysql_query($query);
            
            if($order_operation){
                 $decrese_stock_amount = mysql_query("UPDATE Stock SET amount = amount - '$amount' WHERE
                    food_name = '$name' ");
                 $increase_total_sale = mysql_query("UPDATE Stock SET total_sell_amount = total_sell_amount + '$amount'
                    WHERE food_name = '$name' ");
                 $result_price += $total_price ;
            }
            
            echo "total_price of " . $name . " : " . $total_price ;
            
        }
        
        $query = "INSERT INTO BillSummary (customer_id , sum_price , buy_code) VALUES 
                        ('$customer_id','$result_price','$buy_code')";
        $operation = mysql_query($query);
        
        if($operation){
            header("Location: thankyou.php");
            usleep(5000000);
//            usleep(3000000);
            header("Location: skerestaurant.php");
        }
        
    }

    else{
        echo "Order food not success!";
        header("Location: skerestaurant.php");
    }

   



?>