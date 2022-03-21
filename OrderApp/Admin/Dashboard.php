<?php  
session_start();

require_once('../require/Utils.php');

if (!isset($_SESSION['email']) || $_SESSION['admin'] != 1 ) {
	Redirect('../home.php', false);
}
?>


<!DOCTYPE html>
<html>
<head>
	<style>
		<?php include '../css/style.css'; ?>
	</style>
	<title>User</title>

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
	width: 20%;
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
      echo "<a class='btn'  href='../home.php'>Home</a>";
      echo "<a class='btn' href='../profile.php' class='active' >Profile</a>";
      echo "<a class='btn' href='../Admin/Dashboard.php'>Users</a>";
      echo "<a class='btn' href='../Admin/users/add_user_details.php'>  Add user  </a>";
      echo "<a class='btn' href='../Admin/products/AddProductDetails.php'>  Add product  </a>";
      echo "<a class='btn' href='../Admin/orders.php'>  Orders  </a>";
      echo "<a class='btn' href='../Admin/COrders.php'>  Customized Orders  </a>";
      echo "<a class='btn' href='Report.php' class='active' >Report</a>";
      echo "<a class='btn' href='../Logout.php'>Logout</a>";
?>

</div> 


</header>
<body>



</head>
<body>
<h2 class="title">Bakeliciouzzz cahe house</h2>
<?php 
		$conn = Connect_To_Database();
		// Check connection
		if ($conn) {

			$sqlp = "SELECT * FROM Users";
			$result = $conn->query($sqlp);

			echo "<div class='grid-container'>";
			echo "<h3>Users List : </h3>";


			if ($result->num_rows > 0) {
				   while($row = $result->fetch_assoc()) 
				   {
				   	
				   	echo "<div>";
					   	echo "Firstname: " . $row["firstname"]. "<br / > Lastname: " . $row["lastname"]. "<br /> Email: ". $row["email"].  "<br>";


				   		echo " <form action='./users/delete_user.php' method='POST'>";
				   		echo "<input type='hidden' name='id' value = ".$row["id"].">";
				   		echo "<button>Delete</button>";
				   		echo "</form>";


				   		echo " <form action='./users/update_user.php' method='POST'>";
				   		echo "<input type='hidden' name='id' value = ".$row["id"].">";
				   		echo "<button>Edit</button>";
				   		echo "</form>";	
				   	
				   	echo "</div>";
		    }
			}

			echo "</div>";
		}

?>
</form>
</body>
</html>