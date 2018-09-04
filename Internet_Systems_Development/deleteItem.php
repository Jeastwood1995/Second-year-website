<?php
include "init.php";


if (!empty($_SESSION['basket'])) {
	foreach($_SESSION['basket'] as $key => $value) { // goes through basket array and deletes products from it that match the product ID
		if ($value[$productID] == $productID) { unset($_SESSION['basket'][$key]); }
	}
}

header("Location: {$_SERVER["HTTP_REFERER"]}");
exit;
?>