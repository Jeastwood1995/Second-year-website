<?php
include "init.php";

if(isset($_POST['submit'])){

	$name = htmlentities(trim($_POST['name']));
	$name = filter_var($name, FILTER_SANITIZE_STRING);

	if (empty($name)) {
		$_SESSION['errors'] = '<br>Name field cannot be empty';
	}

	$price = htmlentities(trim($_POST['price']));

	if (empty($price)) {
		$_SESSION['errors'] = '<br>Price field cannot be blank';
	} elseif (ctype_alpha($price)) {
		$_SESSION['errors'] = '<br>Price field cannot contain alphabetical characters';
	}

	$imageName = urldecode(trim($_POST['imageName']));
	$imageName = filter_var($imageName, FILTER_SANITIZE_STRING);

	if (empty($imageName)) {
		$_SESSION['errors'] = '<br>Image name field cannot be blank';
	}

	$genre = htmlentities(trim($_POST['genre']));
	$genre = filter_var($genre, FILTER_SANITIZE_STRING);

	if (empty($genre)) {
		$_SESSION['errors'] = '<br>Genre field cannot be blank';
	}

	$stock = htmlentities(trim($_POST['stock']));
	$stock = filter_var($stock, FILTER_SANITIZE_STRING);

	if (empty($stock)) {
		$_SESSION['errors'] = '<br>Stock field cannot be blank';
	} elseif (ctype_alpha($stock)) {
		$_SESSION['errors'] = '<br>Stock field cannot contain alphabetical characters';
	}


	if (!empty($_SESSION['errors'])) { // if there are errors then users are redirected back to the registration form
		header ('location:addProduct.php');
	}

	$query = "INSERT INTO games(name, price, imageName, genre, stock) VALUES ('$name', '$price', '$imageName', '$genre', '$stock')";
	$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));

	if (mysqli_affected_rows($connection) < 0) {

  		echo "There were errors :<br>" . mysqli_error();

  		echo $query;

  		exit ;

  	} else {
  		print "Game Succesfully added!";
  		print "<br><br>Name: " .$name;
  		print "<br>Price: " .$price;
  		print "<br>Image Name: " .$imageName;
  		print "<br>Genre: " .$genre;
  		print "<br>Stock: " .$stock;
  		print "<br><h3><a href='manageProducts.php'>Return to Games</a></h3>";
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