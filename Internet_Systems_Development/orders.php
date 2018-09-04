<?php
include "init.php";
include "LoginStatus.php";

?>

<html>
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
		<h1 align="center"> JBE Gaming</h1>
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

		<div id="view-orders" align="center">
			<fieldset>
				<legend>
					Orders
				</legend>
				<div class=table-responsive>
					<table cellpadding=10 border=2 class="table">
						<?php
						if (isset($_SESSION['admin'])) { // if admin is logged on then every user orders is displayed
							$query = "SELECT * FROM orders";
						} else { // if only nromal users then their previous ordes are displayed
							$email = $_SESSION['user'];
							$query = "SELECT * FROM orders WHERE username = '$email'";
						}

						$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));
						$rows = mysqli_fetch_array($result);

						if($rows > 0) {
							print  "<tr><th>order ID</th><th>Order Date</th><th>Email</th><th>Total</th></tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>".$row['orderID']."</td>";
								echo "<td>".$row['orderDate']."</td>"; 
								echo "<td>".$row['username']."</td>";
								echo "<td>"."&pound".$row['total']."</td>";
								echo "</tr>";
							}
						} else {
							echo "<h3>You have no previous orders</h3>"; // if user has no previous orders then this message is displayed
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