<?php  
include "init.php";


if(isset($_GET['submit'])){

	if(!empty($_GET['captcha']) && !empty($_GET['firstName']) && !empty($_GET['surname'])) {
		$firstName = htmlentities(trim($_GET['firstName']));
		$firstName = filter_var($firstName, FILTER_SANITIZE_STRING);

		if (is_numeric($firstName)) {
			$_SESSION['errors'] = '<br>First Name field cannot contain numeric characters';
		}

		$surname = htmlentities(trim($_POST['surname']));
		$surname = filter_var($surname, FILTER_SANITIZE_STRING);

		if (is_numeric($surname)) {
			$_SESSION['errors'] = '<br>Surname field cannot contain numeric characters';
		}

		 if($_GET['captcha'] == $_SESSION['security_code']) {
		 	$query = "SELECT password, email FROM users WHERE FirstName = '$firstName' AND Surname = '$surname'";
		 	$result=mysqli_query($connection, $query)  or exit ("Error in query");
		 	
		 	if ($row = mysqli_fetch_assoc($result)) {
		 		$password = $row['password'];
		 		$email = $row['email'];
		 		$_SESSION['details'] = "Your email is: " .$email. ". <br><br>Your decrypted password will be sent to: " .$email;
		 		header ('location:ForgottenDetailsForm.php'); 
		 	} else {
		 		$_SESSION['errors'] = "Sorry, your credentials doesn't exist on our system. Please check credentials or create a new account.";
		 		header ('location:ForgottenDetailsForm.php');
		 	}

		} else {
			$_SESSION['errors'] = "Captcha incorrect. Please type in again.";
			header ('location:ForgottenDetailsForm.php'); 
		}
	} else {
		$_SESSION['errors'] = "Please fill out every field";
		header ('location:ForgottenDetailsForm.php'); 
	}
}
?>