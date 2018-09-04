<?php
include "init.php";

if(isset($_POST['submit'])){

	$firstName = htmlentities(trim($_POST['firstName']));
	$firstName = filter_var($firstName, FILTER_SANITIZE_STRING);

	if (empty($firstName)) {
		$_SESSION['errors'] = '<br>First Name field cannot be empty';
	} elseif (is_numeric($firstName)) {
		$_SESSION['errors'] = '<br>First Name cannot contain numeric characters';
	}

	$surname = htmlentities(trim($_POST['surname']));
	$surname = filter_var($surname, FILTER_SANITIZE_STRING);

	if (empty($surname)) {
		$_SESSION['errors'] = '<br>Surname field cannot be blank';
	} elseif (is_numeric($surname)) {
		$_SESSION['errors'] = '<br>Surname cannot contain numeric characters';
	}

	$email = htmlentities(trim($_POST['email']));
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);

	if (empty($email)) {
		$_SESSION['errors'] = '<br>Email field cannot be blank';
	} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$_SESSION['errors'] = "<br>Invalid email format";
	}

	
	$password = trim($_POST['password']);
	$password = filter_var($password, FILTER_SANITIZE_STRING);
	$password = sha1($password);

	if (empty($password))  {
		$_SESSION['errors'] = '<br>Password field cannot be blank';
	}

	if($_POST['captcha'] != $_SESSION['security_code']) {
		$_SESSION['errors'] = '<br>Captcha incorrect. Try again.';
	}

	if (!empty($_SESSION['errors'])) { // if there are errors then users are redirected back to the registration form
		header ('location: RegisterForm.php');
	}

	$query = "INSERT INTO users(email, password, FirstName, Surname) VALUES ('$email', '$password', '$firstName', '$surname')";


	$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));

	//if (mysqli_num_rows($query) != 0){
  		//$_SESSION['errors'] = "Email is already registered";
  		//header('locaton:RegisterForm.php');
  	//}

	if (mysqli_affected_rows($connection) < 0) {

  		echo "There were errors :<br>" . mysqli_error();

  		echo $query;

  		exit ;

  	}

  	//find ID created

  	$userID = mysqli_insert_id($connection);
  	$query = "SELECT * FROM users WHERE UserID = '$userID'";
  	$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));

  	$row = mysqli_fetch_array($result);
  	echo "\n<h1>Account created for: <font color=\"red\">" . $row["FirstName"] . " " . $row["Surname"] . "</font></h1>\n"; 
    echo "<p>Confirmation will be sent to: \n<br><b> " .$row["email"] . "\n<br>" ;
    echo "<h3><a href='loginform.php'> Return to login </a></h3>";

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
	<div class="container">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</div>
</body>
</html>