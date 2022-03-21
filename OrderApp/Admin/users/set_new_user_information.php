
<?php 
session_start();

require_once('../../require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('../../home.php', false);
}


$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];


$conn = Connect_To_Database();
// Check connection
if ($conn) {


	$sql3  = "UPDATE Users   SET firstname= '".$firstname."' , lastname= '".$lastname."' , email= '".$email."'  , password= '".$password."'    WHERE id= '".$_POST['id']."'";

	echo $sql3;



	if ($conn->query($sql3) === TRUE) {
		Redirect('../../Admin/Dashboard.php', false);
	     
	} else {
		Redirect('../../Admin/Dashboard.php', false);
			}
}


?>