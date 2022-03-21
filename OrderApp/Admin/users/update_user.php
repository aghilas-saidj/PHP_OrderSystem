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







<?php 

		$conn = Connect_To_Database();

		if ($conn) {

			$sqlp = "SELECT * FROM Users WHERE id = ".$_POST['id']."";
			$result = $conn->query($sqlp);

			if ($result->num_rows > 0) {
					$row = $result->fetch_assoc();
				   	echo "<div class='grid-container'>";
				   	echo "<div>";
				  // 	echo "Firstname: " . $row["firstname"]. " - Lastname: " . $row["lastname"]. " - Email: " . $row["email"]. "  - Password:  " . $row["password"]. "<br>";

			   		echo " <form action='set_new_user_information.php' method='POST'>";
			   	//	echo "<input type='number' name='id' value = ".$row["id"].">";
			   		echo "<label>Firstname : </label>";
					echo "<input type='text' name='firstname' value = ".$row["firstname"].">";
					echo "<br />";
					echo "<label>Lastname  : </label>";
				   	echo "<input type='text' name='lastname' value = ".$row["lastname"].">";
				   	echo "<br />";
				   	echo "<label>Email     &ensp; &ensp; : </label>";
				   	echo "<input type='text' name='email' value = ".$row["email"].">";
				   	echo "<br />";
				   	echo "<label>Password  : </label>";
				   	echo "<input type='text' name='password' value = ".$row["password"].">";
				   	echo "<br />";


			   		echo "<button>Edit</button>";
			   		echo "</form>";


		   	
				   	echo "</div>";
				   	echo "</div>";				    }
			
		}

?>