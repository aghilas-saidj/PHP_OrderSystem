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
  <title>Add Product</title>

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
	  width: 12%;
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
      echo "<a class='btn' href='../../Admin/COrders.php'>  Customized Orders  </a>";
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



<!DOCTYPE html>
<html>
<head>
	<title>Add Product</title>
</head>
<body>




	     <form action="AddProduct.php"
	           method="POST"
	           enctype="multipart/form-data">

	           <input type="file" 
	                  name="my_image">

                <input type="text" name="name" class="form-control rounded-left" placeholder="Name" required>
                <input type="number" name="prix" class="form-control rounded-left" placeholder="Prix" required>
                <input type="text" name="description" class="form-control rounded-left" placeholder="Description" required>
                <button name="submit">ADD</button>


</form>


</body>
</html>