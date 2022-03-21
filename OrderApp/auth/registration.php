
<?php 
session_start();

require_once('../require/Utils.php');
if (isset($_SESSION['email'])) {
	Redirect('../home.php', false);
}
else{
		try {
			$firstname = $_POST['firstname'];
			$lastname = $_POST['lastname'];
			$email = $_POST['email'];
			$password = $_POST['password'];

		} catch (Exception $e) {
			echo "enter you cord";
		}




		

		// Create connection
		$conn = Connect_To_Database();
		// Check connection
		if ($conn) {

			$sql = "SELECT firstname,lastname FROM Users WHERE email= '".$email."'";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			  // Chech if email of firstname in database
			  
				Redirect('authentication2.php', false);
			  }
			else{

				echo " success \n";
				$sql2  = "INSERT INTO Users (firstname , lastname , email , password , Type)VALUES('".$firstname."' ,'".$lastname."' , '".$email."' , '".$password."' , 'cmt' )";

				if ($conn->query($sql2) === TRUE) {
					$_SESSION['firstname'] = $firstname;
					$_SESSION['lastname'] = $lastname;
					$_SESSION['email'] = $email;
					Redirect('../home.php', false);
				     
				} else {
					Redirect('authentication2.php', false);
						}

		        } 

		}
		else{exit;}
}

?>
