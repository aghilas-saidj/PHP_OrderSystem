<?php  
session_start();

require_once('./require/Utils.php');
?>


<!DOCTYPE html>
<html>
<head>
  <style>
<?php include './css/style.css'; ?>
  </style>
  <title>Wait..</title>

   <div class="topnav11">
<style type="text/css">







img {
    border-radius: 5px;
    width: 100%;
}




.btn {
    width: 76%;
    color: rgb(244, 236, 241);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: linear-gradient(to right, #9C27B0, #E040FB);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 3px solid rgba(255, 255, 255, 0.81);
    margin-bottom: 50px;
    margin-left: 1px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;}


  header{
  border: solid #9f8c8c;
  margin-top: -1%;
  background-color: #9012b599;
  border-radius: 5px;
  width: 100%;
  height: ;
  padding-top: 1%;
  padding-bottom: 1%;
  }
  button {
  background-color: #d2266f7d;
  border: solid #ffffff4a;
  border-radius: 5px;
  color: #141c1c;
  font-family: 'Ubuntu', sans-serif;
  letter-spacing: 1px;
  font-size: 110%;
  width: 74%;
  height: 115%;
  margin-bottom: 1%;
}


.loader {
  border: 16px solid #f3f3f3; /* Light grey */
  border-top: 16px solid #3498db; /* Blue */
  border-radius: 50%;
  width: 120px;
  height: 120px;
  animation: spin 2s linear infinite;
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}





</style>

</head>
<header>
  
<?php 

  if (!isset($_SESSION['email'])) {
    echo "<a class='btn' href='./auth/authentication.php'>Login</a>";
    echo "<a class='btn'  href='./auth/authentication2.php'>Register</a>";
      }
  else{

    if ($_SESSION['admin']==1) {
      echo "<a class='btn'  href='home.php'>Home</a>";
      echo "<a class='btn' href='profile.php' class='active' >Profile</a>";
      echo "<a class='btn' href='./Admin/Dashboard.php'>Users</a>";
      echo "<a class='btn' href='./Admin/users/add_user_details.php'>  Add user  </a>";
      echo "<a class='btn' href='./Admin/products/AddProductDetails.php'>  Add product  </a>";
      echo "<a class='btn' href='./Admin/orders.php'>  Orders  </a>";
      echo "<a class='btn' href='./Admin/COrders.php'>  Customized Orders  </a>";
      echo "<a class='btn' href='./Admin/Report.php' class='active' >Report</a>";
      echo "<a class='btn' href='Logout.php'>Logout</a>";
     }

     else{

      
      echo "<a class='btn'  href='home.php'>Home</a>";
      echo "<a  class='btn' href='profile.php' class='active' >profile</a>";
      echo "<a class='btn'  href='preorderproducts.php'>My Orders</a>";
      echo "<a class='btn' href='customize_cake.php'>  Customizes Cake  </a>";
      echo "<a class='btn'  href='cutomize_cupcake.php'>Cutomize Cupcake</a>";
      echo "<a class='btn' href='Logout.php'>Logout</a>";
     } 

  }
?>
   </div> 


</header>

<body>

<div class='grid-container'>
<div class='loader'></div> 


<?php
echo "<p>Please Wait For Payement ... </p> "; 
?>

      <script>
         setTimeout(function(){
            window.location.href = 'finished.php';
         }, 5000);
      </script>




</body> 


</html>

