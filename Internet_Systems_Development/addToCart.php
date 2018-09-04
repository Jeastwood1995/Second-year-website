<?php
include "init.php";

$productID = $_GET['productID'];
$stock = $_GET['stock'];
$name = $_GET['name'];
$quantity = $_GET['quantity'];
$price = $_GET['price'];

if ($stock == 0) {
	$_SESSION['noStock'] = "Unfortunately this product is out of stock"; // if game selected has no stock then message is displayed and user is redirected to main page
	header("Location: {$_SERVER["HTTP_REFERER"]}");
} else {


	if (empty($_SESSION['basket'])) {
		$_SESSION['basket'] = array(array('productID'=>$productID, 'name'=>$name, 'quantity'=>$quantity, 'price'=>$price));
	} elseif (array_key_exists($productID, $_SESSION['basket'])) {
		$_SESSION['basket'] = array(array($quantity += $quantity, $price += $price));
	} else {
		array_push ($_SESSION['basket'], array('productID'=>$productID, 'name'=>$name, 'quantity'=>$quantity, 'price'=>$price));
	}

	
	unset($_SESSION['noStock']); // unsets no stock message when another game is added
}
header("Location: {$_SERVER["HTTP_REFERER"]}");
exit;
?>