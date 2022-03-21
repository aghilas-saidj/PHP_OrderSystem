
<?php 
session_start();

require_once('../require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('../home.php', false);
}


$price = $_POST['price'];



$conn = Connect_To_Database();
// Check connection
if ($conn) {


	$sql3  = "UPDATE Customize_Products   SET prix= '".$price."'  WHERE id= '".$_POST['id']."'";

	if ($conn->query($sql3) === TRUE) {
		Redirect('COrders.php', false);
	     
	} else {
		Redirect('Corder_Details.php', false);
			}
}


?>