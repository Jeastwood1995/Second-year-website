<?php
session_start();
$userEmail = $_SESSION['user']; // session user gets assigned to variable to display logout message
session_destroy();
session_start();

if (isset($userEmail)) {
	$_SESSION['logout'] = "$userEmail successfully logged out";
	header('location:Website.php');	
} else {
	$_SESSION['logon'] = "You aren't logged on";
	header('location:loginform.php');
}



?>
