<?php
session_start();

require_once('./require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('home.php', false);
}


$conn = Connect_To_Database();
$id = $_POST['id'];
if ($conn) {

  $sql4 =  "UPDATE OrderProducts   SET confirmed= '1' WHERE  id_u = '".$_SESSION['id']."'" ;
  $sql5 =  "UPDATE Customize_Products   SET confirmed= '1' WHERE  id_u = '".$_SESSION['id']."'" ;

  if ($conn->query($sql4) === TRUE && $conn->query($sql5) === TRUE)
  
	  Redirect('After_payement.php', false);
} else {
	  Redirect('preorderproducts.php', false);
}
?>