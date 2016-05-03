

    <div class = "container">
      
        
<!--
    <script type = "text/javascript">
        
            function deleteClick(id_temp) {
            
            console.log("DOING WORK");
            
            var cid = "php echo $id; ";
                
                
            console.log("this : " + cid);
            var cfm = confirm("Are you sure you want to delete this user : " + cid);
            if(cfm == true) {
            window.location.href = 'delete_user.php' + '?id=' + cid ;
                }
            }



    </script>
-->
      
        <table class= "table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Address</th>
                    <th>E-mail</th>
                    <th>Phone number</th>
                    <th>Total Buying</th>
                </tr>
            </thead>
            
            <tbody>
               
                <?php
                    session_start();
                    $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
        mysql_select_db("SKErestaurant") or die("Couldn't find database");
                
                    $temp_count = mysql_query("SELECT * FROM Users WHERE type = 1");
                    $count = mysql_num_rows($temp_count);
                    $_SESSION['user_count'] = $count ;
                
                    refresh();
                    
                   
                
                function refresh(){ 
                    
                    $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
        mysql_select_db("SKErestaurant") or die("Couldn't find database");
                
                    $query = mysql_query("SELECT Customer.customer_id, username,customer_firstname,customer_lastname,address,email,phone_number,sum(sum_price)
                    FROM Users JOIN Customer ON Customer.customer_id = Users.customer_id 
                    LEFT JOIN BillSummary ON BillSummary.customer_id = Users.customer_id WHERE Users.type = 1
                    group by username
                    order by Users.customer_id");
                    
                    
                   
                    $inject = "";
                    $temp_count = mysql_query("SELECT * FROM Users WHERE Users.type = 1");
                    $count = mysql_num_rows($temp_count);
                    for($i = 0 ; $i< $count; $i++) {
                    
                        $inject .= "<tr>";
                        for($j = 0; $j<9; $j++) {
                            
                            $message = mysql_result($query,$i,$j);
                            
                            $get_id = mysql_result($query,$i,1);
                            
                            
                            if(is_null($message)){
                                $message = 0;
                            }
                            else if($j == 8) {
//                                $id = '\"' . $get_id .'\"';
                                
                                $message = "<button id = \"kickuser-admin" . $i . "\" class = \"btn btn-danger\"";
                                
                                $message .= " onClick = deleteClick(\"" . $get_id . "\")";
                                
                              
                                    
                                $message .= ">Banned</button>"; 

                                

                            }
                            $inject .= "<td>" . $message . "</td>"; 
                        }
                        $inject .= "</tr>";
                    
                    }
                    echo $inject;
                }
                
        //<button id = "kickuser-admin1 class = "btn btn-danger" onClick = "deleteClick("id")>Delete        
                ?>
                
        
                
                
            </tbody>
            
            
            
        </table>
         <h2 >User Count : <b id = "user_count"><?php
                echo $_SESSION["user_count"];
                ?></b></h2>
        
        
        
        
    </div>
    <script src = "js/user-admin.js"></script>