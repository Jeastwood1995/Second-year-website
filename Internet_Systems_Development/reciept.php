<?php  
include "init.php";

$orderID = $_GET['orderID']; // retrives order ID and date 
$date = $_GET['date'];

print "<h1 align='center'>JBE Gaming</h1>";
print "<h2>Order has been accepted for: ".$_SESSION['user']. "</h2>";

print "<h3> Order Date: ".date('Y-m-d H:i:s')."</h3>";

if (!empty($_SESSION['basket'])) { // retrieves basket contents
	echo "<table><tr><th>ID</th><th width=200>Game</th><th>Quantity</th><th>Price</th></tr>";
			$total = 0; // used to hold the total rpcie of all games
			foreach ($_SESSION['basket'] as $item) {
				$total = $total + $item['price']; // adds every product bought by the user to the total
				print "<tr align=center>".
				"<td>".$item['productID']."</td>".
				"<td>".$item['name']."</td>".
				"<td>".$item['quantity']."</td>".
				"<td>"."&pound".$item['price']."</td>".
				"</tr>";
			} 
			echo "<tr align=center><td>-----</td><td>----------</td><td>-----</td><td>-----</td></tr>";  
			echo "<tr><td></td><td></td><td align=center><strong>Total: </td>" . 
			"<td>" ."&pound". $total."</td></strong></tr>"; 
			echo "</table>";
			echo "<h3>Order conformation has been sent to: ".$_SESSION['user']."</h3>";
			$_SESSION['basket'] = NULL;
			echo "<p><a href=Website.php>Back to Home</a></p>";

		}

?>

<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> JBE Gaming </title>
	<link href="bootstrap-3.3.6-dist/css/bootstrap.css" rel="stylesheet">
</head>

<body>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
</body>

</html>
