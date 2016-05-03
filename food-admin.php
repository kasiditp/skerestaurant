

    <div class = "container">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Amount</th>
                </tr>
                
            </thead>
            
            <tbody>
                <?php
                    session_start();
                    $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
                
                    $temp_count = mysql_query("SELECT * FROM Stock");
                
                    $count = mysql_num_rows($temp_count);
                
                    $_SESSION['food_count'] = $count;
                
                    refresh();
                
                    function refresh() {
                        $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to the DB!!");
                        
                        mysql_select_db("SKErestaurant") or die("Couldn't find database");
                        
                        $query = mysql_query("SELECT * FROM Stock");
                        
                        $inject = "";
                        
                        
                        
                
                        $count = mysql_num_rows($query);
                        
                        for($i = 0 ; $i<$count; $i++) {
                            $inject.= "<tr>";
                            for($j = 0;$j<5; $j++) {
                                if($j==4) {
                                    $message = "<button class = \"btn btn-success\" id = \"restock-admin" . $i . "\" onClick = \"restockClick(". $i . ")\">Restock</button>";
                                }
                                else
                                    $message = mysql_result($query,$i,$j);
                                if($j == 3)
                                    $inject .= "<td id = \"foodleft-admin" . $i ."\">". $message . "</td>";
                                else
                                    $inject .= "<td>" . $message . "</td>";  
                                
                            }
                            $inject .= "</tr>";
                        }
                        echo $inject;
                        
                    }
                
                ?>
                
            </tbody>
            
            
            
        </table>
        
        
    </div>
    
   <script src = "js/food-admin.js"></script>