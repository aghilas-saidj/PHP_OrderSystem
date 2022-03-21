<?php
session_start();

require_once('../require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('../home.php', false);
}


$conn = Connect_To_Database();
$id = $_POST['id'];
$sql4 =  "UPDATE OrderProducts   SET served= '1' WHERE  id = '".$id."'" ;
echo $sql4;
if ($conn) {

  if ($conn->query($sql4) === TRUE)
  
	  Redirect('orders.php', false);
} else {
	  Redirect('orders.php', false);
}

?>