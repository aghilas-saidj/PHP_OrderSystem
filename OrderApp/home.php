<?php  
session_start();

require_once('./require/Utils.php');

error_reporting(0);

?>


<!DOCTYPE html>
<html>
<head>
	<style>
		<?php include './css/style.css'; ?>
	</style>
	<title>Home</title>

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

.title {
    align-items: center;
    border-bottom: 3px solid #b768ce;
    padding-left: 36%;
    display: flex;
    justify-content: space-between;
    font-weight: 300;
    margin: 20px 0 0;
    font-family: Arial Helvetica sans-serif;
    color: #b768ce;
}

</style>

</head>
<header>
	
		<?php 

		error_reporting(0);

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

	}?>
	 </div> 


</header>

<body>
<h2 class="title">Bakeliciouzzz cahe house</h2>

<?php 

		error_reporting(0);
		$conn = Connect_To_Database();
		// Check connection
		if ($conn) {

			$sqlp = "SELECT * FROM Products";
			$result = $conn->query($sqlp);

			echo "<div class='grid-container'>";


			if ($result->num_rows > 0) 

			{

				   while($row = $result->fetch_assoc()) 
				   {
					 //  	echo "<div class='grid-container'>";
					   	echo "<div>";


					  // 	echo "<img src='uploads/'".$row['image']."''>";
					   	$img = "uploads/".$row['image']."";

					   	echo "<img src='".$img."' width='50%' height='60%' />";

					   	echo "<br />";


					   	echo "" . $row["name"]. "<br /> ";
					   	echo "Price : RM " . $row["prix"]. "<br />Description : RM". $row["description"]. "";

				   	//	echo " <form action='product_details.php' method='POST'>";
				   	//	echo "<input type='hidden' name='id' value = ".$row["id"].">";
				   	//	echo "<button>Details</button>";
				   	//	echo "</form>";
					   	if ($_SESSION['admin'] != 1)
					   	{

					   	
					   		echo " <form action='order.php' method='POST'>";
					   		echo "<input type='hidden' name='image' value = ".$row["image"].">";
					   		echo "<input type='hidden' name='id_u' value = ".$_SESSION["id"].">";
					   		echo "<input type='hidden' name='name' value = ".$row["name"].">";
					   		echo "<input type='hidden' name='prix' value = ".$row["prix"].">";
					   		echo "<input type='hidden' name='description' value = ".$row["description"].">";
					   		echo "<button>Order</button>";
					   		echo "</form>";
					   	}

					   	elseif ($_SESSION['admin'] == 1 ) {
					   		echo " <form action='./Admin/products/DeleteProduct.php' method='POST'>";
					   		echo "<input type='hidden' name='id' value = ".$row["id"].">";
					   		echo "<button>Delete</button>";
					   		echo "</form>";


					   		echo " <form action='./Admin/products/UpdateProduct.php' method='POST'>";
					   		echo "<input type='hidden' name='id' value = ".$row["id"].">";
					   		echo "<button>Edit</button>";
					   		echo "</form>";		

					   	}
					   
					   	echo "</div>";	

				    }
		    
			}

			echo "</div>";	
		}

?>
</form>

</body> 


</html>