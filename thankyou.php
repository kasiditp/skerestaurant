<!DOCTYPE HTML>
    <?php session_start(); ?>
    <div class = "container" style="background-color : white">
       <table class="table table-bordered">
           <tbody>
               <tr>
                   <h2>Thank you for your order</h2>
                Your order number is : <b id = thankyou_order_number><?php echo $_SESSION["buy_code"]; ?></b>
               </tr>
               <tr>
                   Your order summary<br><br>
                   <table>
                      <tr>
                         <td>
                              Your contract phone number :
                         </td>
                         <td>
                             <b id = thankyou_phonenumber>000000000</b>
                         </td>
                          
                      </tr>
                      
                      <tr>
                          <td>
                              Your order : 
                          </td>
                          
                          <td id = "thankyou_order_summary">
                              
                       </td>
                          
                          
                      </tr>
                      
                      <tr>
                          <td id = "thankyou_order_totalprice">
                              
                          </td>
                          
                      </tr>
                      
                      <tr>
                          <td>
                              <h2>You will be redirected back to main page in 5 second.</h2>
                          </td>
                          
                          
                          
                      </tr>
                       
                   
                       
                       
                   </table>
                   
                   
                   
               </tr>
           </tbody>
           
       </table>
        
        
        
        
    </div>
<script src="js/thankyou.js"></script>


