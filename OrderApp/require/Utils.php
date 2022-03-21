<?php
//require_once 'C:\xampp\htdocs\OrderApp\config\Config.php';


define('DB_HOST', 'localhost');
define('DB_DATABASE', 'OrderApp');
define('DB_USERNAME', 'phpapp');
define('DB_PASSWORD', '123456789');

	
function Connect_To_Database()
{
	$conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD , DB_DATABASE);
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	
	return $conn;

}


function Redirect($url, $permanent = false)
{
    header('Location: ' . $url, true, $permanent ? 301 : 302);

    exit();
}  

?>