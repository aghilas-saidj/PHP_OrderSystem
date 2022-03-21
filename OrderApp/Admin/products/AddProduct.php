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
// if ($conn) {



// 	$sql3  = "INSERT INTO Products (name , prix , description)VALUES('".$name."' ,'".$prix."' , '".$description."')";



// 	if ($conn->query($sql3) === TRUE) {
// 		Redirect('../../Admin/Dashboard.php', false);
	     
// 	} else {
// 		Redirect('../../Admin/Dashboard.php', false);
// 			}
// }




if (isset($_POST['submit']) && isset($_FILES['my_image'])) {
	//include "db_conn.php";

	echo "<pre>";
	print_r($_FILES['my_image']);
	echo "</pre>";

	$img_name = $_FILES['my_image']['name'];
	$img_size = $_FILES['my_image']['size'];
	$tmp_name = $_FILES['my_image']['tmp_name'];
	$error = $_FILES['my_image']['error'];

	if ($error === 0) {
		if ($img_size > 111125000) {
			$em = "Sorry, your file is too large.";
		    header("Location: index.php?error=$em");
		}else {
			$img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
			$img_ex_lc = strtolower($img_ex);

			$allowed_exs = array("jpg", "jpeg", "png"); 

			if (in_array($img_ex_lc, $allowed_exs)) {
				$new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
				$img_upload_path = '../../uploads/'.$new_img_name;
				move_uploaded_file($tmp_name, $img_upload_path);

				// Insert into Database


				$sql  = "INSERT INTO Products (name , prix , description , image)VALUES('".$name."' ,'".$prix."' , '".$description."' , '".$new_img_name."')";

				echo $sql;


				mysqli_query($conn, $sql);
				Redirect('../../home.php', false);
			}else {
				$em = "You can't upload files of this type";
		        Redirect('../../Admin/Dashboard.php', false);
			}
		}
	}else {
		Redirect('../../home.php', false);
	}

}else {
	Redirect('../../Admin/Dashboard.php', false);
}






?>