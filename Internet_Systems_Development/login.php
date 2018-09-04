<?php
include "init.php";


if(isset($_POST['submit'])) {
	$email = trim($_POST['email']);
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	$password = trim($_POST['password']);
	$password = filter_var($password, FILTER_SANITIZE_STRING);
	$password = sha1($password);

	$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	//echo $query;
	//exit();


	$result=mysqli_query($connection, $query)  or exit ("Error in query");

	if ($row = mysqli_fetch_assoc($result)) { // if email/password are succesful then email is assignd to session user
		$_SESSION['user']= $row['email'];
		header ('location:Website.php');
	} else { // else email and password is invalid
		$_SESSION['error']= "Unable to log you on as: " .$email. ". Please check your credentials.";
		header ('location:loginform.php');
	} 

}



?>