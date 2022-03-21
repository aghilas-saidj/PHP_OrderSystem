<?php
session_start();

require_once('../../require/Utils.php');
?>


<!DOCTYPE html>
<html>
<head>
  <style>
    <?php include '../../css/style.css'; ?>
  </style>
  <title>Profile</title>

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

.add{

  cursor: pointer;
  border-radius: 5em;
  color: #fff;
  background: linear-gradient(to right, #9C27B0, #E040FB);
  border: 0;
  padding-left: 40px;
  padding-right: 40px;
  padding-bottom: 10px;
  padding-top: 10px;
  font-family: 'Ubuntu', sans-serif;
  margin-left: 12%;
  font-size: 13px;
  box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
}

</style>

</head>
<header>
  
    <?php 

  if (!isset($_SESSION['email'])) {
    echo "<a class='btn' href='../auth/authentication.php'>Login</a>";
    echo "<a class='btn'  href='../auth/authentication2.php'>Register</a>";
      }
  else{

    if ($_SESSION['admin']==1) {
      echo "<a class='btn'  href='../../home.php'>Home</a>";
      echo "<a class='btn' href='../../profile.php' class='active' >Profile</a>";
      echo "<a class='btn' href='../../Admin/Dashboard.php'>Users</a>";
      echo "<a class='btn' href='../../Admin/users/add_user_details.php'>  Add user  </a>";
      echo "<a class='btn' href='../../Admin/products/AddProductDetails.php'>  Add product  </a>";
      echo "<a class='btn' href='../../Admin/orders.php'>  Orders  </a>";
      echo "<a class='btn' href='../../Admin/orders.php'>  Customized Orders  </a>";
      echo "<a class='btn' href='Report.php' class='active' >Report</a>";
      echo "<a class='btn' href='../../Logout.php'>Logout</a>";
     }

     else{
      echo "<a  class='btn' href='../../profile.php' class='active' >profile</a>";
      echo "<a class='btn'  href='../../preorderproducts.php'>My Orders</a>";

        echo "<a class='btn' href='../../Logout.php'>Logout</a>";
     } 

  }?>
   </div> 


</header>






<html>

<head>
  <link rel="stylesheet" href="../css/style.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <title>Add User</title>

  <style type="text/css"><?php   include "../css/style.css"; ?></style>
</head>

<body>
  <div class="main">
    <p class="sign" align="center">Add User</p>
    <form class="form1" action="add_user.php" method="POST" >
      <input class="un " type="text" align="center" placeholder="Firstname" name="firstname">
      <input class="un " type="text" align="center" placeholder="Lastname" name="lastname">
      <input class="un " type="text" align="center" placeholder="Email" name="email">
      <input class="pass" type="password" align="center" placeholder="Password" name="password">
      <button class="add"  align="center">ADD</button>                
    </div>
     
</body>

</html>




