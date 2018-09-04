<?php 

	function loginStatus(){
		
		if (isset($_SESSION['user'])) {
			$_SESSION['message'] = $_SESSION['user'] . " currently logged on";
		} else {
			$_SESSION['message'] = "<p>You are not logged on: <a href ='loginform.php'> Login</a></p>";

		}
		return $_SESSION['message'];
	}

 ?>