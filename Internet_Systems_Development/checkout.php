<?php
include "init.php";
include "LoginStatus.php";

if (!isset($_SESSION['user'])) { // if no-one has logged then re-directs them to login page
	$_SESSION['error'] = "You must be logged before proceeding to checkout";
	header('location: loginform.php');
}
?>
<html>
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
		<div id="menu/search bar" align="right">
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

		<div id=checkout>
			<fieldset>
				<legend>
					Basket
				</legend>
				<?php
				echo "<h2> Shopping cart for: ".$_SESSION['user']. "</h2>";
			if (empty($_SESSION['basket'])) { // if user hasn't pressed buy 
			echo "<h3>Your cart is empty</h3";
			} else { // if user has pressed buy
				echo "<form action='payment.php' method='post'>";
				echo "<div class=table-responsive>";
				echo "<table class=table cellpadding=10 border=0><tr><th>ID</th><th width=200>Game</th><th>Quantity</th><th>Price</th></tr>";
				$total = 0; // used to hold the total price of all games
				foreach ($_SESSION['basket'] as $item) {
					$total = $total + $item['price']; // adds every product bought by the user to the total
					print "<tr>".
					"<td>".$item['productID']."</td>".
					"<td>".$item['name']."</td>".
					"<td><input align='right' size='5' name='quantity' value=".$item['quantity']." /></td>".
					"<td>"."&pound".$item['price']."</td>".
					"<td><a href=deleteItem.php?productID=".$item['productID']. 
					"&name=".$item['name']. 
					"&quantity=1&price=".$item['price'].">Delete</a</td></tr>";
				} 
				echo "<tr align=left><td>-----</td><td>------------</td><td>-------</td><td>-------</td></tr>";  
				echo "<tr><td></td><td></td><td><strong>Total: </td>" . 
				"<td>" ."&pound". $total.".</td></strong></tr>"; 
				echo "</table>";
				echo "<input type='submit' class=btn btn-default name='submit' value='Proceed to Payment' />";
				echo "</form>";
				$_SESSION['total'] = $total;
			}
			?>
		</fieldset>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</div>
</body>

</html>
