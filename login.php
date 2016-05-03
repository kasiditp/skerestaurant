<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $failToLogIn = false;
    
    $_SESSION["username"] = $username;
    

    if($username && $password) {
        $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
        mysql_select_db("SKErestaurant") or die("Couldn't find database");
        $query = mysql_query("SELECT * FROM Users WHERE username = '$username' ");
        $numrows = mysql_num_rows($query);

        if($numrows !== 0){
          
            
        
            while($row = mysql_fetch_assoc($query)){
                $dbusername = $row['username'];
                $dbpassword = $row['password'];
            }

        if($username == $dbusername && md5($password) == $dbpassword){
            
            $get_type = mysql_query("SELECT type FROM Users WHERE username = '$username' ");
            $type = mysql_result($get_type,0);
            $food_info = getFoodInformation();
            $user_info = getUserInformation();

            $_SESSION["food_name"]   = $food_info[0];
            $_SESSION["food_price"]  = $food_info[1];
            $_SESSION["food_amount"] = $food_info[2];
            $_SESSION["total_sell_amount"] = $food_info[3];
            $_SESSION["user_info"]   = $user_info;
            
            if($type == 1){
               header("Location: skerestaurant.php");
            }
            else if($type == 2){
                
                
                header("Location: skerestaurant-admin.php");
            }
            
            else if($type == 0){
                echo "YOU GOT BANNED WE REALLY APOLOGIZE FOR THIS AND HOPE TO SERVICE YOU NEXT SEASON";
            }
            

        }
        else{
              $failToLogIn = true;
              // echo json_encode(500);

             header("Location: index.html");
             die("Incorrect password");
        }

      }
      else {
        die("That user doesn't exist!");
      }
    }
    else{
        echo json_encode($username);
        die();
        
    }

    function getFoodInformation(){
        $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
        mysql_select_db("SKErestaurant") or die("Couldn't find database");
        
        $query = "SELECT count(*) FROM Stock";
        $temp_count = mysql_query($query);
        $count = mysql_result($temp_count,0);
        
        $food_name = array();
        $food_price = array();
        $food_amount = array();
        $total_sell_amount = array();
        
        for($i = 1 ; $i <= $count ; $i++){
            $temp1 = "SELECT food_name FROM Stock WHERE food_id = '$i' ";
            $temp2 = "SELECT price FROM Stock WHERE food_id = '$i' ";
            $temp3 = "SELECT amount FROM Stock WHERE food_id = '$i' ";
            $temp4 = "SELECT total_sell_amount FROM Stock WHERE food_id = '$i' ";
            
            $temp_name = mysql_query($temp1);
            $temp_price = mysql_query($temp2);
            $temp_amount = mysql_query($temp3);
            $temp_total_sell_amount = mysql_query($temp4);
            
            $name = mysql_result($temp_name,0);
            $price = mysql_result($temp_price,0);
            $amount = mysql_result($temp_amount,0);
            $sell_amount = mysql_result($temp_total_sell_amount,0);
            
            
            array_push($food_name , $name);
            array_push($food_price , $price);
            array_push($food_amount , $amount);
            array_push($total_sell_amount , $sell_amount);
        }
        
        $food_info = array();
        $food_info[0] = $food_name;
        $food_info[1] = $food_price;
        $food_info[2] = $food_amount;
        $food_info[3] = $total_sell_amount;
         
        
        return $food_info;
    }

    function getUserInformation(){
        $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
        mysql_select_db("SKErestaurant") or die("Couldn't find database");
        
        $user_info = array();
        $temp_username = $_SESSION["username"];
        
        $get_userID = "SELECT customer_firstname,customer_lastname,address,email,phone_number 
         FROM Users JOIN Customer ON Users.customer_id = Customer.customer_id 
         WHERE Users.username = '$temp_username' ";
        
        $result = mysql_query($get_userID) or die(mysql_error());
        
        for($i = 0 ; $i < 5; $i++){
            $temp = mysql_result($result , 0 , $i);
            array_push($user_info , $temp);
        }
        
            
        
       return $user_info;
        
        
    }
?>


</html>
