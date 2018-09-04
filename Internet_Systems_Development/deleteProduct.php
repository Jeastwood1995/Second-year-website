<?php
include "init.php";

if (isset($_GET['productID'])) {
	$productID = $_GET['productID'];

	$query = "DELETE FROM games WHERE productID = '$productID'";

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