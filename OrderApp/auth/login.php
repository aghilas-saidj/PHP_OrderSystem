
<?php 
session_start();

require_once('../require/Utils.php');
if (isset($_SESSION['email'])) {
	Redirect('../home.php', false);
}
else{
		try {
			$email = $_POST['email'];
			$password = $_POST['password'];

		} catch (Exception $e) {
			echo "enter you cord";
		}




		

		// Create connection
		$conn = Connect_To_Database();
		// Check connection
		if ($conn) {

			$sql = "SELECT id , firstname,lastname FROM Users WHERE email= '".$email."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // Chech if email of firstname in database
			  $sql3 = "SELECT id , firstname ,lastname ,  Type ,  password FROM Users WHERE email='".$email."'";
			  $result3 = $conn->query($sql3);
			  $row3 = $result3->fetch_assoc();
			//  echo $row3['password'];
			  if ($row3['password'] == $password) {

			  	//check if admin or not

			  	if ($row3['Type'] == 'admin') {

			  		$_SESSION['admin'] = 1;

				  	$_SESSION['email'] = $email;
				  	$_SESSION['firstname'] = $row3['firstname'];
				  	$_SESSION['lastname'] = $row3['lastname'];
					Redirect('../home.php', false);

			  	} else {
			  		$_SESSION['admin'] = 0;

				  	$_SESSION['email'] = $email;
				  	$_SESSION['firstname'] = $row3['firstname'];
				  	$_SESSION['lastname'] = $row3['lastname'];
				  	$_SESSION['id'] = $row3['id'];
					Redirect('./authentication.php', false);
			  }}


			  else{Redirect('./authentication.php', false);}


			  }



			else
			{
				// No firstname in database
			//  echo "0 results";
			  Redirect('login.php', false);
			}

		}
		else{exit;}
}

?>
