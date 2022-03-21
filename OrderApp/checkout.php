<?php  
session_start();

require_once('./require/Utils.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
</head>
<body>
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="confirme_order.php"   method="POST" >
      
        <div class="row">
          <div class="col-50">
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
            <label for="email"><i class="fa fa-envelope"></i> Email</label>
            <input type="text" id="email" name="email" placeholder="john@example.com" required>
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
            <label for="city"><i class="fa fa-institution"></i> City</label>
            <input type="text" id="city" name="city" placeholder="New York" required>

            <div class="row">
              <div class="col-50">
                <label for="state">State</label>
                <input type="text" id="state" name="state" placeholder="NY" required>
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001" required>
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018" required>
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352" required>
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr" required> Shipping address same as billing
        </label>
         <input type="submit" value="Continue to checkout" class="btn" required>
      </form>
    </div>
  </div>



<?php

$conn = Connect_To_Database();
$a=array(0);
// Check connection
if ($conn) {


      $sqlp = "SELECT * FROM OrderProducts WHERE id_u= '".$_SESSION['id']."'";
      $result = $conn->query($sqlp);
      $sqlp1 = "SELECT * FROM Customize_Products WHERE id_u= '".$_SESSION['id']."'";
      $result1 = $conn->query($sqlp1);

      echo "<div class='grid-container'>";

      if ($result->num_rows > 0 || $result1->num_rows > 0) 
      {



              echo "<div class='col-25'>";  
                echo "<div class='container'>";
                   echo "<div>";
                    echo "<h4>Cart <span class='price' style='color:black'><i class='fa fa-shopping-cart'></i> <b></b></span></h4>";


             while($row = $result->fetch_assoc()) 
             {
                if ($row['confirmed'] == '0') {


                  
                        echo "<p><a href='#'>".$row['name'].   " </a> <span class='price'>  &ensp;".$row['prix']."</span></p>";

                        $a[0] = $a[0] + $row['prix'];
                        
                        array_push($a , $row['prix']);
                        

                }

             }



             while($row1 = $result1->fetch_assoc()) 
             {
                if ($row1['prix'] != '0' && $row1['confirmed'] != '1') {


                  
                        echo "<p><a href='#'>".$row1['type'].   " </a> <span class='price'>  &ensp;".$row1['prix']."</span></p>";

                        $a[0] = $a[0] + $row1['prix'];
                        
                        array_push($a , $row1['prix']);
                        

                }

             }




                        echo " <p>Total &ensp;<span class='price' style='color:black'><b> RM &ensp;".$a[0]."</b></span></p>";
                      echo " </div>";
                    echo  "</div>";
              echo "</div>";



          echo "</div>";

        }






      }
        
?>




</body>
</html>
