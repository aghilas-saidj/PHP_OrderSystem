<?php 

session_start();

require_once('../require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('../home.php', false);
}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Report</title>

		<style>
		<?php include '../css/style.css'; ?>
	</style>
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


.pay{

	background-color: #d2266f7d;
	border: solid #ffffff4a;
	border-radius: 5px;
	color: #141c1c;
	font-family: 'Ubuntu', sans-serif;
	letter-spacing: 1px;
	font-size: 110%;
	width: 100%;
	height: 115%;
	margin-bottom: 1%;
}

</style>

</head>
<header>
	
		<?php 

	if (!isset($_SESSION['email'])) {
		echo "<a class='btn' href='./auth/authentication.php'>Login</a>";
		echo "<a class='btn'  href='./auth/authentication2.php'>Register</a>";
		echo "<a class='btn '' href='home.php'>Home</a>";
			}
	else{

		if ($_SESSION['admin']==1) {
	      echo "<a class='btn'  href='../home.php'>Home</a>";
	      echo "<a class='btn' href='../profile.php' class='active' >Profile</a>";
	      echo "<a class='btn' href='../Admin/Dashboard.php'>Users</a>";
	      echo "<a class='btn' href='../Admin/users/add_user_details.php'>  Add user  </a>";
	      echo "<a class='btn' href='../Admin/products/AddProductDetails.php'>  Add product  </a>";
	      echo "<a class='btn' href='../Admin/orders.php'>  Orders  </a>";
	      echo "<a class='btn' href='../Admin/COrders.php'>  Customized Orders  </a>";
	      echo "<a class='btn' href='Report.php' class='active' >Report</a>";
	      echo "<a class='btn' href='../Logout.php'>Logout</a>";
		 }

		 else{
		 	echo "<a class='btn'  href='home.php'>Home</a>";
		 	echo "<a  class='btn' href='profile.php' class='active' >profile</a>";
		 	echo "<a class='btn'  href='preorderproducts.php'>My Orders</a>";
		 	echo "<a class='btn' href='customize_cake.php'>  Customizes Cake  </a>";
		 	echo "<a class='btn'  href='cutomize_cupcake.php'>Cutomize Cupcake</a>";
	   		echo "<a class='btn' href='Logout.php'>Logout</a>";
		 } 

	}?>
	 </div> 


</header>

<body>


<?php

$conn = Connect_To_Database();
// Check connection
$makedCake = array(0);
if ($conn) {


			$sqlp = "SELECT * FROM OrderProducts";
			$result = $conn->query($sqlp);


			echo "<div class='grid-container'>";
			echo "<h3>REPORT : </h3>";

			if ($result->num_rows > 0) 

			{
				   while($row = $result->fetch_assoc()) 
				   {


					   	if ($row['served'] == '1') {
				   	

						   	echo "<div>";
	 					   	$img = "../uploads/".$row['image']."";

						   	echo "<img src='".$img."' width='50%' height='60%' />";

						   	echo "<br />";


	                        $makedCake[0] = $makedCake[0] + $row['prix'];
	                        
	                        array_push($makedCake , $row['prix']);




					   	    echo"Name : " . $row["name"]. " <br /> Prince : " . $row["prix"]. " RM<br>";
					   	    

					   	    }
					   	    else
					   	    {

					   	    	echo "<p>Paid</p>";
					   	    }

					   	echo "</div>";
					   }
					echo "</div>";

			}

			else{
				echo "No Ordered ";
			}





			$sqlp = "SELECT * FROM Customize_Products";
			$result = $conn->query($sqlp);

			echo "<div class='grid-container'>";
			echo "<h3>Customized Orders: </h3>";

			if ($result->num_rows > 0) 

			{
				   while($row = $result->fetch_assoc()) 
				   {

				   	if ($row['served'] == '1') {

				   	

					   	echo "<div>";

					   	echo "<br />";

						   	
						   	    echo"Type : " . $row["type"]. " <br /> Description : " . $row["description"]. " <br>";


						echo "</div>";

					   	    }

					   	
					   }

			

					echo "</div>";

			}

			else{
				echo "No Ordered ";
			}




}
else
{
	echo "error connection to db";
}

?>






</body>
</html>


