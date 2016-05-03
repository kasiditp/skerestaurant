<?php
    session_start();
    
    $username = $_POST['username'];
    $password  = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address = $_POST['address'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    

    if(($password === $confirm_password) && $username && $password && $confirm_password
        && $first_name && $last_name && $address && $email && $phone_number){
        
        //change host -> change DB name and connection info
        
        $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
        $db = mysql_select_db("SKErestaurant") or die("Couldn't find database");
        
       
        
        $temp = "SELECT * FROM Users WHERE username = '$username'";
        $check_available = mysql_query($temp);
        $numrows = mysql_num_rows($check_available);
        
        
        if(($numrows) == 0) {
            
            $id = "SKERES - " . substr(md5(uniqid(mt_rand(), true)) , 1, 8);
            
            $real = md5($password);
            $query1 = "INSERT INTO Customer (customer_id,customer_firstname,customer_lastname,address,email,phone_number) 
                        VALUES ('$id','$first_name','$last_name','$address','$email','$phone_number')";
            $registration1 = mysql_query($query1) or die(mysql_error());
            
            $query2 = "INSERT INTO Users (customer_id,username,password) VALUES ('$id','$username','$real')";
            $registration2 = mysql_query($query2) or die(mysql_error());
            
            
            
            if($registration1 && $registration2){
                echo "YOUR REGISTRATION IS COMPLETED, WAIT 3 SECONDS TO REDIRECT TO MAIN PAGE";
                usleep(3000000);
                header("Location: index.html");
            }
            
        }
        
        else{   
            echo "this username is already existed!";
        }

    }
    else{
        echo "please make sure that confirm password are same as password OR fill all empty space!!";
        //header('Location: https://google.co.th');  
    }

?>