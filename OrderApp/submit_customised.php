<?php 
session_start();

require_once('./require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('home.php', false);
}?>


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

	}?>
	 </div> 


</header>



<body>

<?php

$ingrediens = $_POST['ingrediens'];
$numbers = $_POST['numbers'];
$description = $_POST['description'];
$id_u = $_SESSION['id'];
$size = $_POST['size'];
$type = $_POST['type'];

//echo $ingredients;

$conn = Connect_To_Database();


if (isset($_POST['submit'])) {

	$sql  = "INSERT INTO Customize_Products (id_u , prix , description ,numbers , ingrediens , size , type ,confirmed ,served )VALUES('".$id_u."' ,'0', '".$description."' , '".$numbers."' , '".$ingrediens."', '".$size."', '".$type."' , '0' , '0')";

	mysqli_query($conn, $sql);
	//Redirect('home.php', false);
	//echo $sql;

	echo "<h3>Please Wait For Admin Check For Your Order</h3><br />";
	echo "<h3>You Will Find It In MyOrders Page</h3>";


	

}else {
	//Redirect('home.php', false);
	Redirect('home.php', false);
}






?>

<body>

</body>
</html>