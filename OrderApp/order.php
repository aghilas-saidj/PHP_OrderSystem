<?php 
session_start();

require_once('./require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('./auth/authentication.php', false);
}


$name = $_POST['name'];
$prix = $_POST['prix'];
$description = $_POST['description'];
$id_u = $_POST['id_u'];
$image = $_POST['image'];


$conn = Connect_To_Database();
// Check connection
if ($conn) {



	$sql3  = "INSERT INTO OrderProducts (name , prix , description , id_u , image ,  confirmed , served)VALUES('".$name."' ,'".$prix."' , '".$description."', '".$id_u."' , '".$image."' , '0' , '0')";



	if ($conn->query($sql3) === TRUE) {
		Redirect('preorderproducts.php', false);
	     
	} else {
		Redirect('home.php', false);
			}
}


?>