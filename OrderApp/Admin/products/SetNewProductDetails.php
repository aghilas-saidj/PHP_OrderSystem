
<?php 
session_start();

require_once('../../require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('../../home.php', false);
}


$name = $_POST['name'];
$prix = $_POST['prix'];
$description = $_POST['description'];


$conn = Connect_To_Database();
// Check connection
if ($conn) {


	$sql3  = "UPDATE Products   SET name= '".$name."' , prix= '".$prix."' , description= '".$description."'    WHERE id= '".$_POST['id']."'";

	echo $sql3;



	if ($conn->query($sql3) === TRUE) {
		Redirect('../../Admin/Dashboard.php', false);
	     
	} else {
		Redirect('../../Admin/Dashboard.php', false);
			}
}


?>