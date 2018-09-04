<?php
include 'init.php';
include 'LoginStatus.php';

if (isset($_SESSION['user'])) {
	header ('location:account.php'); // located logged on users to their account if they are already logged on
}

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
		<section id="sidebar">
			<h3 align="center">Member Login Page</h3>

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

			<div name="logon form" align="center">
				<form method="post" action="login.php">
					<fieldset>
						<legend>
							Login
						</legend>
						<table width="400">
							<tbody>
								<tr>
									<td width="92">Email:</td>
									<td width="300">
										<input type="text" name="email" size="50" maxLength="50" value=''/>
									</td>
								</tr>
								<tr>
									<td>Password: </td>
									<td>
										<input type="password" name="password" size="50" maxLength="50"/>
									</td>
								</tr>
								<tr>
									<td>
										<input type="submit" name="submit" class="btn btn-default" value="Submit"/>
									</td>
								</tr>
							</tbody>
						</table>
					</fieldset>
				</form>
				<?php
				if (isset($_SESSION['login'])) {
					echo $_SESSION['login'];
				}

				if (isset($_SESSION['error'])) {
					echo $_SESSION['error'];
				}
				?>

			</div>

			<div name="register-and-retrive details" align="right">
				<p>
					<a href="RegisterForm.php">Create a new Account</a>
				</p>
				<p>
					<a href="ForgottenDetailsForm.php">Retrieve Password/Username</a>
				</p>
			</div>

		</form>
	</section>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>
</html>



