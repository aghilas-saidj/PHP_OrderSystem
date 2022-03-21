<?php
session_start();

require_once('../../require/Utils.php');
if (!isset($_SESSION['email'])) {
	Redirect('../../home.php', false);
}


$conn = Connect_To_Database();
$id = $_POST['id'];
if ($conn) {

  $sql4 = "DELETE FROM Users WHERE id= '".$id."'";

  if ($conn->query($sql4) === TRUE){}
  
	  Redirect('../Dashboard.php', false);
} else {
	  Redirect('../Dashboard.php', false);
}

?>