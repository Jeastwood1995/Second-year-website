<?php
include "init.php";
include "LoginStatus.php";
print LoginStatus();

if(isset($_POST['submit'])){
	$userID = $_POST['hideUserID'];

	$firstName = trim($_POST['firstName']);
	$firstName = filter_var($firstName, FILTER_SANITIZE_STRING);

	if (empty($firstName)) {
		$_SESSION['errors'] = '<br>First Name field cannot be empty';
	} elseif (is_numeric($firstName)) {
		$_SESSION['errors'] = '<br>First Name cannot contain numeric characters';
	}

	$surname = trim($_POST['surname']);
	$surname = filter_var($surname, FILTER_SANITIZE_STRING);

	if (empty($surname)) {
		$_SESSION['errors'] = '<br>Surname field cannot be blank';
	} elseif (is_numeric($surname)) {
		$_SESSION['errors'] = '<br>Surname cannot contain numeric characters';
	}

	$email = urldecode(trim($_POST['email']));
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	if (empty($email)) {
		$_SESSION['errors'] = '<br>Email field cannot be blank';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['errors'] = '<br>Invalid email format';
	}

	$password = trim($_POST['password']);
	$password = filter_var($password, FILTER_SANITIZE_STRING);
	$password = sha1($password);

	if (empty($password))  {
		$_SESSION['errors'] = '<br>Password field cannot be blank';
	}

	if (!empty($_SESSION['errors'])) { // if there are errors then users are redirected back to the registration form
		header ('location: updateDetailsForm.php');
	}

	$query = "UPDATE users SET userID = '$userID', firstName = '$firstName', surname = '$surname', email = '$email', password = '$password' WHERE userID = '$userID'";

	$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));
	

	if (mysqli_affected_rows($connection) < 0) {

  		echo "There were errors :<br>" . mysqli_error();

  		echo $query;

  		exit ;

  	} else {
  		
  		print "<br><br>Email updated to: " .$email;
  		print "<br>First Name updated to: " .$firstName;
  		print "<br>Surname updated to: " .$surname;
  		print "<br>Password updated to: " .$password;
  		print "<br><h3><a href='account.php'>Return to Account</a></h3>";
  	}
}
?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> JBE Gaming </title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>