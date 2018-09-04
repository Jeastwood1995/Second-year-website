<?php
include "init.php";
include "LoginStatus.php";

$email = $_SESSION['admin'] // admin session is assigned to variable used to pass email to relevant pages
?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Title of the document</title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="main.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<h1 align="center">JBE Gaming </h1>
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

		<div id="account-menu" align="center">
			<fieldset>
				<legend>
					Admin Menu
				</legend>
				<table>
					<?php
					echo "<td><a href='updateDetailsForm.php?email=$email'>Update Details</a></td>";
					echo "<td>|</td>";
					echo "<td><a href='orders.php?email=$email'>View Orders</a></td>";
					echo "<td>|</td>";
					echo "<td><a href='manageProducts.php'>Edit Game Details</a></td>";
					echo "<td>|</td>";
					echo "<td><a href='viewUsers.php'>View All Users</a></td>";
					?>
				</table>
			</fieldset>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</div>
</body>

</html>