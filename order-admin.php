
    <div class = "container">
        <table class="table table-bordered">
            <thead>
                <th>Buy Code</th>
                <th>Username</th>
                <th>Detail</th>
                <th>Customer Address</th>
                <th>Sum_price</th>
                <th>Time</th>
                <th>Status</th>


            </thead>

            <tbody>
                <?php
                    session_start();
                    $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't connect to DB!!");
                    mysql_select_db("SKErestaurant") or die("Couldn't find database");

                    $temp_count = mysql_query("SELECT * FROM BillSummary");

                    $_SESSION['bill_count'] = $temp_count;

                    refresh();

                    function refresh() {
                        $connect = mysql_connect("localhost","zen","zen12345") or die("Couldn't find database");
                        mysql_select_db("SKErestaurant") or die("Couldn't find database");

                        $query = mysql_query("SELECT buy_code, username, address, sum_price, time,
STATUS FROM BillSummary JOIN Users ON BillSummary.customer_id = Users.customer_id JOIN Customer ON Customer.customer_id = BillSummary.customer_id ORDER BY time DESC  ");

                        $inject = "";

                        $temp_count = mysql_query("SELECT * FROM BillSummary");

                        $count = mysql_num_rows($temp_count);

                        for($i = 0 ; $i<$count; $i++) {
                            $inject .= "<tr>";
                            for($j = 0;$j<7;$j++) {
                                $inject .= "<td>";
                                if($j==6) {
                                    $buy_code = mysql_result($query,$i,0);

                                    $check = mysql_query("SELECT status FROM BillSummary WHERE buy_code = '$buy_code' AND 
                                               status = 1 ");
                                    $rows = mysql_num_rows($check);

                                    if($rows == 0){
                                      // $message = "<button class = \"btn btn-danger\" id = \"waiting-admin" . $i . "\" onClick = \"waitingClick(\"" . $buy_code . "\")\">Waiting</button>";
                                      $message = "<button id = \"waiting-admin" . $i . "\" class = \"btn btn-danger\"";

                                      $message .= " onClick = waitingClick(\"" . $buy_code . "\")";

                                      $message .= ">Waiting</button>";
                                    }
                                    else {
                                      $message = "<button class = \"btn btn-success\" id = \"completed-admin" . $i . "\" onClick = \"completedClick(". $i . ")\">Completed</button>";
                                      //$message = "<button class = \"btn btn-success\" id = \"waiting-admin" . $i . "\" onClick = \"waitingClick(". $i . ")\">Waiting</button>";

                                    }
                                }


                                else if($j == 2){
                                    $message = "";
                                    $buy_code = mysql_result($query,$i,0);
                                    $get_detail = mysql_query("SELECT food_name, OrderLog.amount FROM OrderLog JOIN Stock ON Stock.food_id = OrderLog.food_id WHERE buy_code = '$buy_code'");
                                    $inside_count = mysql_num_rows($get_detail);

                                    for($k = 0 ; $k < $inside_count ; $k++) {

                                            $food_name = mysql_result($get_detail,$k,0);
                                            $food_amount = mysql_result($get_detail,$k,1);
                                            $message .= "<li>" . $food_name . "  (" . $food_amount .")" . "</li>";

                                    }

                                }
                                else if($j == 3){
                                    $message = mysql_result($query,$i,2);

                                }
                                
                                else if($j == 4){
                                    $message = mysql_result($query,$i,3);

                                }
                                else if($j == 5){
                                    $message = mysql_result($query,$i,4);

                                }

                                else
                                    $message = mysql_result($query,$i,$j);

                                $inject .= $message . "</td>";


                        }

                    }

                    echo $inject;
                  }

                ?>

            </tbody>



        </table>


    </div>
<script src = "js/order-admin.js"></script>
