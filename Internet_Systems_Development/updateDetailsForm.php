<?php
include "init.php";
include "LoginStatus.php";
$email = '0';
if (isset($_GET['email'])) {
	$email = $_GET['email'];
}

$query = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));

$row = mysqli_fetch_assoc($result);
?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link type="text/css" rel="stylesheet" href="main.css"/>
	<title>Lab 6</title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="main.css" rel="stylesheet">
</head>
<body>
	<div class="container">
		<h1 align="center">JBE Gaming</h1> 
		<div id="menu/search bar" align="left">
			<nav class="nav-inline">
				<ul class="nav nav-tabs">
					<li class="nav-item">
						<a class="nav-link" href="Website.php"> Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="account.php"> Account</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="checkout.php"> Checkout</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php"> Logout</a>
					</li>
				</ul>
			</nav>
			<p align="left"><?php print LoginStatus(); ?> </p>
		</div>

		<div id="update-form">
			<form method="post" action="updateDetailsAction.php" >
				<fieldset>
					<legend>
						Update Details
					</legend>
					<label for="firstName">First Name: <br></label>
					<input type="text" name="firstName" value="<?php echo $row['FirstName']; ?>" />
					<label for="surname"><br>Surname: <br></label>
					<input type="text" name="surname" value="<?php echo $row['Surname']; ?>"/>
					<label for="email"><br>Email: <br></label>
					<input type="email" name="email" value="<?php echo $row['email']; ?>"/>
					<label for="password"><br>Password: <br></label>
					<input type="password" name="password"/>
					<input type="hidden" name="hideUserID" value="<?php echo $row['userID']; ?>"/> 
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
if (isset($_SESSION['errors'])) {
	echo $_SESSION['errors'];
	exit;
}

?> 