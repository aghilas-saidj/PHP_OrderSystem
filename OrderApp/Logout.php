<?php
session_start();
require_once('./require/Utils.php');

if (isset($_SESSION['email'])) {
	session_unset(); 
	session_destroy();
	Redirect('./auth/authentication.php', false);
}
else{
	session_unset(); 
	session_destroy();
	Redirect('./auth/authentication.php', false);
}

?>