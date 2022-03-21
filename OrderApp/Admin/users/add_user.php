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



	$sql3  = "INSERT INTO Users (firstname , lastname , email , password , Type)VALUES('".$firstname."' ,'".$lastname."' , '".$email."' , '".$password."' , 'cmt')";



	if ($conn->query($sql3) === TRUE) {
		Redirect('../../Admin/Dashboard.php', false);
	     
	} else {
		//Redirect('../../Admin/Dashboard.php', false;
		echo "error";
		echo "    ";

		echo $sql3;

		echo $firstname;
		echo "    ";
		echo $lastname;
		echo "    ";
		echo $email;
		echo "    ";
		echo $password;			}
}


?>