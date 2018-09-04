<?php
include "init.php";
include "LoginStatus.php";
$productID = 0;
if (isset($_GET['productID'])) {
	$productID = $_GET['productID'];
}

$query = "SELECT * FROM games WHERE productID = '$productID'";

$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));

$row = mysqli_fetch_assoc($result);
?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lab 6</title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="main.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<div id="menu/search bar" align="right">
			<p>
				<a href="Website.php"> Home</a>
				|
				<a href="loginform.php"> Account</a>
				|
				<a href="checkout.php"> Checkout</a>
				|
				<a href="logout.php"> Logout</a>
			</p>
			<p align="right"><?php print LoginStatus(); ?> </p>
		</div>

		<div id="update-form">
			<form method="post" action="updateProductAction.php" >
				<fieldset>
					<legend>
						Update Game Details
					</legend>
					<label for="productID">Product ID: <br></label>
					<input type="text" name="productID" value="<?php echo $row['productID']; ?>" />
					<label for="name"><br>Name: <br></label>
					<input type="text" name="name" value="<?php echo $row['name']; ?>" />
					<label for="surname"><br>Price: <br></label>
					<input type="text" name="price" value="<?php echo $row['price']; ?>"/>
					<label for="Image Name"><br>Image Name: <br></label>
					<input type="text" name="imageName" value="<?php echo $row['imageName']; ?>"/>
					<label for="genre"><br>Genre: <br></label>
					<input type="text" name="genre" value="<?php echo $row['genre']; ?>"/>
					<label for="genre"><br>Stock: <br></label>
					<input type="text" name="stock" value="<?php echo $row['stock']; ?>"/>
					<input type="submit" value="Submit" name="submit"/>
					<input type="reset" value="Clear" />
				</fieldset>
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</div>
</body>
</html>

<?php
if (isset($_SESSION['errors']))
{
	echo $_SESSION['errors'];
	exit;
}

?>