	<?php
	include "init.php";
	include "LoginStatus.php";
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

			<div name= "addGame" align="left">
				<form name="add-product" method="post" action="addProductAction.php">
					<fieldset>
						<legend>
							Add Game
						</legend>
						<table width="500">
							<tbody>
								<tr width="100">
									<td>Name:</td>
									<td>
										<input type="text" name="name" size="50" maxLength="50" value=''/>
									</td>
								</tr>
								<tr>
									<td>Price: </td>
									<td>
										<input type="text" name="price" size="50" maxLength="50"/>
									</td>
								</tr>
								<tr>
									<td>Image Name: </td>
									<td>
										<input type="text" name="imageName" size="50" maxLength="50" />
									</td>
								</tr>
								<tr>
									<td>Genre: </td>
									<td>
										<input type="text" name="genre" size="50" maxLength="50" />
									</td>
								</tr>
								<tr>
									<td>Stock: </td>
									<td>
										<input type="text" name="stock" size="50" maxLength="50" value=''/>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="submit" value="Submit"/>
									</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</form>
			</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
			<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
		</div>
	</body>

	</html>