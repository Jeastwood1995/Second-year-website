<?php
include 'init.php';
include 'LoginStatus.php';


?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> JBE Gaming </title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="main.css" rel="stylesheet">
</head>

<body>
	<div class="container">
		<h1 align="center"> JBE Gaming </h1>
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


		<div id="retrieve-details-form" align="center">
			<form method="get" action="retrievedetails.php">
				<fieldset>
					<legend>
						Retrieve Details
					</legend>
					<table width="400">
						<tbody>
							<tr>
								<td width="92">First Name: </td>
								<td width="300">
									<input type="text" name="firstName" size="50" maxLength="50" value=''/>
								</td>
							</tr>
							<tr>
								<td width="92">Surname: </td>
								<td width="300">
									<input type="text" name="surname" size="50" maxLength="50" value=''/>
								</td>
							</tr>

							<tr>
								<td>
									<img style="-webkit-user-select: none" src="capatcha.php" />
								</td>
							</tr>
							<tr>
								<td>Enter Captcha: </td>
								<td width="300">
									<input type="text" name="captcha" size="50" maxLength="50" value=''/>
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="submit" class="btn btn-default"value="Submit"/>
								</td>
							</tr>
						</tbody>
					</table>
				</fieldset>
			</form>
			<?php

			if (isset($_SESSION['errors'])){
				echo $_SESSION['errors'];
				exit;
			}

			if (isset($_SESSION['details'])) {
				echo $_SESSION['details'];
				exit;
			}
			?>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</div>
</body>
</html>

