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
	<link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
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
			<form name="search" method="get" action="Website.php">
				<input id="search-bar" name="search_games">
				<button type="submit" class="btn btn-default"> Search Games </button>
			</form>
			<p align="left"><?php print LoginStatus(); ?> </p> 
		</div>

		<div id="basket" align="right">
			<h1> <strong>Basket</strong></h1>
			<p>
				<?php
				if (!empty($_SESSION['basket'])) {
					echo "<table><tr align=center><th>ID</th><th width=100>Game</th><th>Quantity</th><th>Price</th></tr>";
				$total = 0; // used to hold the total price of all games
				foreach ($_SESSION['basket'] as $item) { // loops though the basket and 
				$total = $total + $item['price']; // adds every product bought by the user to the total
				print "<tr align=center>".
				"<td>".$item['productID']."</td>".
				"<td>".$item['name']."</td>".
				"<td>".$item['quantity']."</td>".
				"<td>"."&pound".$item['price']."</td>".
				"<td><a href=deleteItem.php?productID=".$item['productID']. // product Id is passed to determine which product wil be deleted from basket
				">Delete</a</td></tr>";
			}
			echo "<tr align=center><td>-----</td><td>----------</td><td>-----</td><td>-----</td></tr>";  
			echo "<tr><td></td><td></td><td align=center><strong>Total: </td>" . 
			"<td>" ."&pound". $total."</td></strong></tr>"; // prints out total variable 
			echo "</table>";
		} else { // if no items has been added
			print "<p align=right> Your basket is empty</p>";
		}

		if (isset($_SESSION['noStock'])) { // if game has no stock and user presses buy then shows this message
			echo "<p align=right>".$_SESSION['noStock']."</p>";
		}
		?>
	</div>

	<div id="products">
		<fieldset align="center">
			<legend >
				Search games
			</legend>
			<div class="dropdown open" align="left">
				<button class="btn btn-secondary dropdown-toggle dropdown-menu-right" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><strong>Genre</strong></button>

				<div class="dropdown-menu dropdown-menu-left" aria-labelledby="dropdownMenu1">
					<blockquote>
						<button class="dropdown-item" type="button"><a href="Website.php?genre=All">All</a></button>
						<button class="dropdown-item" type="button"><a href="Website.php?genre=Action">Action</a></button>
						<button class="dropdown-item" type="button"><a href="Website.php?genre=RPG">RPG</a></button>
						<button class="dropdown-item" type="button"><a href="Website.php?genre=Sport">Sport</a></button>
						<button class="dropdown-item" type="button"><a href="Website.php?genre=Survival">Survival</a></button>    
					</blockquote>
				</div>

			</div>
		</fieldset>
	</div>

	<div id="display">
		<p>&nbsp;</p>
		<?php
		// get genre of game from the search bar and display it
		$name = "";
		$genre = "";

		$query = "SELECT * FROM games";

		if (isset($_GET['search_games'])) { // if user has typed in search bar 
			if (!empty ($_GET['search_games'])) {

				$name = htmlentities(trim($_GET['search_games']));
				$query = "SELECT * FROM games WHERE name LIKE '%$name%'";
				echo $query;
			} 
		} 

		if (isset($_GET['genre'])) { // retrive from drop down menu
			$genre = $_GET['genre'];

			if ($genre!="All"){
				$query = $query." WHERE genre = '$genre'";			
			}
		}

		if (isset($_GET['sort'])) { // if user has clicked on the links on the displayed games
			$sort = $_GET['sort'];
			$query = $query." ORDER BY $sort";
		} 


		$result = mysqli_query($connection, $query)  or exit ("Error in query: $query. ".mysqli_error($connection));
		$rows = mysqli_fetch_array($result);

		if($rows > 0) {
			print "<br><br><h3>Here are $name $genre games</h3>";
			// create a table
			print "<div class=table-responsive>";
			print  "<table class=table cellpadding=10 border=2>"; 
			print  "<th><a href=Website.php?sort=productID>productID</th><th><a href=Website.php?sort=name>Name</th><th><a href=Website.php?sort=price>Price</th><th><a href=Website.php?sort=imageName>Image</th><th><a href=Website.php?sort=genre>Genre</th><th><a href=Website.php?sort=stock>Stock</th>"; // links to sort games

			while ($row = mysqli_fetch_assoc($result)) {// stored in variable to pass to addToCart script
				echo "<tr>";
				echo "<td>".$row['productID']."</td>";
				echo "<td>".$row['name']."</td>"; 
				echo "<td>"."&pound".$row['price']."</td>";
				echo '<td><img class=img-responsive height=250 width=250 src="images/' . $row['imageName'] . '" /></td>';
				echo "<td>".$row['genre']."</td>";
				echo "<td>".$row['stock']."</td>";
				echo "<td><a href=addToCart.php?productID=".$row['productID']. 
				"&name=".$row['name']. 
				"&quantity=1&price=".$row['price']."&stock=".$row['stock'].">Buy</a></td>";
				echo "</tr>";
			}
			print "</table>";
			print "</div>";
		} else {
			print "<br><br><h3>Select Game type from the Menu</h3>";
		}
		?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</div>
</body>

</html>
