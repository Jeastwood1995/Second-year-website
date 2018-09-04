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

		<div id="manage-products" align="center">
			<fieldset>
				<legend>
					Manage Games
				</legend>
				<div class="table-responsive">
					<table class="table" cellpadding=10 border=1>
						<?php
						$query = "SELECT * FROM games";

						$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));
						$rows = mysqli_fetch_array($result);

						if($rows > 0) {
							print  "<tr><th>productID</th><th>Name</th><th>Price</th><th>Image Name</th><th>Genre</th><th>Stock</th></tr>";
							while ($row = mysqli_fetch_assoc($result)) {
								echo "<tr>";
								echo "<td>".$row['productID']."</td>";
								echo "<td>".$row['name']."</td>"; 
								echo "<td>"."&pound".$row['price']."</td>";
								echo '<td><img class=img-responsive src="images/' . $row['imageName'] . '"  height=250 width=250/></td>';
								echo "<td>".$row['genre']."</td>";
								echo "<td>".$row['stock']."</td>";
								echo "<td><a href=updateProductForm.php?productID=".$row['productID'].">Update Details</a></td>";
								echo "<td><a href=deleteProduct.php?productID=".$row['productID'].">Delete Product</a></td>";
								echo "<td><a href=addProduct.php>Add Product</a></td>";
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