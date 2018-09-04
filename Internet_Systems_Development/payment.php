<?php
include "init.php";

if (isset($_SESSION['total'])) {
	$total = $_SESSION['total'];
}
?>
<!doctype html>

<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1"> 
	<title>JBE Gaming Payment Page</title> 
	<link href="bootstrap-3.3.6-dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="main.css" rel="stylesheet">
</head> 

<body>
	<div class="container">
		<h1 align="center"> JBE Gaming Payment Page </h1>

		<div id="payment-form">
			<form action="paymentAction.php" method="post">
				<fieldset>
					<legend>
						Please enter credit/debit card details
					</legend>
					<table>
						<tr>
							<td> Cardholder Name: </td>
							<td><input type="text" name="name" maxlength="50" /></td>
						</tr>
						<tr>
							<td> Credit/debit card number: </td>
							<td><input type="text" name="cardNumber" maxlength="16" /></td>
						</tr>
						<tr>
							<td> Expiry Date: </td>
							<td><input type="date" name="expiryDate"  /></td>
						</tr>
						<tr>
							<td> Security code: </td>
							<td><input type="text" name="securityNumber" maxlength="3"/></td>
						</tr>
						<tr>
							<td> Total: </td>
							<td><input type="number" name="total" readonly="yes" value="<?php print $total ?>" /></td>
						</tr>
					</table>
					<?php
					if (isset($_SESSION['errors'])){
						echo $_SESSION['errors'];
					}
					?> 
				</fieldset>
				<br><input type='submit' class="btn btn-default" name='submit' value='Submit' />
			</form>
		</div>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<script src="bootstrap-3.3.6-dist/js/bootstrap.min.js"></script>
	</div>
</body> 
</html>