<?php
include "init.php";

if (isset($_GET['email'])) {
	$email = $_GET['email'];

	$query = "DELETE FROM users WHERE email = '$email'";

	mysqli_query($connection, $query);

	if (mysqli_affected_rows($connection) > 0) {

//If so , return to calling page(stored in the server variables as HTTP_REFERER

		header("Location: {$_SERVER['HTTP_REFERER']}");

	} else {

// print error message

		echo "Error in query: $query. " . mysqli_error($connection);

		exit ;
	}
}

?>