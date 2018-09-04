<?php
include "init.php";

if (isset($_POST['submit'])) {
	
	$total = htmlentities($_POST['total']);

	$name = htmlentities($_POST['name']);
	$name = filter_var($name, FILTER_SANITIZE_STRING);

	if (empty($name)) {
		$_SESSION['errors'] = '<br>Name field cannot be empty';
	} elseif (is_numeric($name)) {
		$_SESSION['errors'] = '<br>Name cannot contain numeric characters';
	}

	$cardNumber = htmlentities(trim($_POST['cardNumber']));
	$cardNumber = filter_var($cardNumber, FILTER_SANITIZE_NUMBER_INT);

	if (empty($cardNumber)) { // checks for validation
		$_SESSION['errors'] = '<br>Card Number field cannot be empty';
	} elseif (ctype_alpha($cardNumber)) {
		$_SESSION['errors'] = '<br>Card Number field cannot contain alphabetical characters';
	} elseif (strlen($cardNumber) != 16) {
		$_SESSION['errors'] = '<br>Card Number field must be 16 characters long';
	}

	$expiryDate = $_POST['expiryDate'];

	if (empty($expiryDate)) {
		$_SESSION['errors'] = '<br>Expiry date field cannot be empty';
	}

	$securityNumber = htmlentities(trim($_POST['securityNumber']));
	$securityNumber = filter_var($securityNumber, FILTER_SANITIZE_NUMBER_INT);

	if (empty($securityNumber)) {
		$_SESSION['errors'] = '<br>Security number field cannot be empty';
	} elseif (ctype_alpha($securityNumber)) {
		$_SESSION['errors'] = '<br>Security number field cannot contain alphabetical characters';
	} elseif (strlen($securityNumber) != 3) {
		$_SESSION['errors'] = '<br>Security number field must be 3 characters long';
	}

	if (!empty($_SESSION['errors'])) { // if there are errors then users are redirected back to the registration form
		header ('location:payment.php');
	} else {


		$date = time(); // creates time for order

		$username = $_SESSION['user'];

		$query = "INSERT INTO orders(orderDate, username, total) VALUES('$date', '$username', '$total')";

		$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));

		if (mysqli_affected_rows($connection) < 0) {

			echo "There were errors :<br>" . mysqli_error();

			echo $query;

			exit ;
		} else {	
			header ("location:reciept.php?orderID=$orderID&date=$date"); 
		}
	}
}
?>