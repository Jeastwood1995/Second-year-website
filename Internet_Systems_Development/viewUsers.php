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

		<div id="users" align="center">
			<fieldset>
				<legend>
					User Accounts
				</legend>
				<div class=table-responsive>
					<table cellpadding=10 border=1 class=table>
						<?php
						$query = "SELECT * FROM users";

						$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));
						$rows = mysqli_fetch_array($result);

						if($rows > 0) {
							print  "<tr><th>UserID</th><th>First Name</th><th>Surname</th><th>Email</th><th>Password</th></tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>".$row['userID']."</td>";
								echo "<td>".$row['FirstName']."</td>"; 
								echo "<td>".$row['Surname']."</td>";
								echo '<td>'.$row['email'].'</td>';
								echo "<td>".$row['password']."</td>";
								echo "<td><a href=updateDetailsForm.php?email=".$row['email'].">Update Details</a></td>";
								echo "<td><a href=deleteUser.php?email=".$row['email'].">Delete User</a></td>";
								echo "</tr>";
							}
						}

						?>
					</table>
				</div>
			</fieldset>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</div>
</body>

</html>