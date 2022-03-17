<!-- css -->
<style type="text/css">
	.invoice{
		width: 500px;
		border: 2px dashed black;
		margin: 0 auto;
		padding: 30px;
	}

	#success{
		padding: 25px;
		font-size: 20px;
		border: 2px solid black;
		width: 500;
		display: inline-block;
		margin: 0 700 0 400;
	}

	table {
		border-collapse: collapse;
	}

	table, th, td {
		border: 1px solid black;
	}

	td {
		padding: 3px;
	}

</style>

<div class="invoice">

<?php
	/*
    if (!isset($_SESSION['user_id'])){
    	echo "<script>alert('Log in to submit an order.');</script>";
        header('location: login.php');
    }*/
	
	require("config.php");
	include('session.php');
	$errors = "";

	$postcodeRegex = "/^[A-Z][0-9][A-Z]\s[0-9][A-Z][0-9]$/";
	$phoneNumRegex = "/^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/";
	$emailRegex = "/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/";

	//$name = $_POST['name'];
	//$email = $_POST['email'];
	//$phone = $_POST['phone'];
	$address = $_POST['address'];
	$city = $_POST['city'];
	$postcode = $_POST['postalcode'];
	$province = $_POST['province'];
	$prod1 = $_POST['product1'];
	$prod2 = $_POST['product2'];
	$prod3 = $_POST['product3'];
	$dTime = $_POST['dTime'];
	$salesTax = array("AB"=>0.05,"BC"=>0.05,"MB"=>0.05,"NB"=>0.15,"NL"=>0.15,
		"NT"=>0.05,"NS"=>0.15,"NU"=>0.05,"ON"=>0.13,"QC"=>0.05,"PE"=>0.15,
		"SK"=>0.05,"YT"=>0.05);


	//validateName($name);
	//validateEmail($emailRegex, $email);
	//validatePhone($phoneNumRegex, $phone);
	validateAddress($address);
	validateCity($city);
	validatePostalCode($postcodeRegex, $postcode);
	validateProducts($prod1, $prod2, $prod3);

	if (trim($errors) == ""){
		printInvoice();
	} else {
		echo $errors;
	}
	/*
	function validateName($name){
		global $errors;
		if (trim($name) == ""){
			$errors = "$errors You need to enter a name!<br/>";
		}
	}

	function validateEmail($emailRegex, $email){
		global $errors;
		if (trim($email) == ""){
			$errors = "$errors You need to enter an email!<br/>";
		} else if (!preg_match($emailRegex, $email)){
			$errors = '$errors Email is not in the correct format!<br/>';
		}
	}

	function validatePhone($phoneNumRegex, $phone){
		global $errors;
		if (trim($phone) == ""){
			$errors ="$errors You need to enter a phone number!<br/>";
		} else if (!preg_match($phoneNumRegex, $phone)){
			$errors = "$errors Phone number is not in the correct format!<br/>";
		}
	}*/

	function validateAddress($address){
		global $errors;
		if (trim($address) == ""){
			$errors = "$errors You need to enter an address!<br/>";
		}
	}

	function validateCity($city){
		global $errors;
		if (trim($city) == ""){
			$errors = "$errors You need to enter a city!<br/>";
		}
	}

	function validatePostalCode($postcodeRegex, $postcode){
		global $errors;
		if (trim($postcode) == ""){
			$errors = "$errors You need to enter a postal code!<br/>";
		} else if (!preg_match($postcodeRegex, $postcode)){
			$errors = "$errors Postal Code not in correct format!<br/>";
		}
	}

	function validateProducts($prod1, $prod2, $prod3){
		global $errors;
		if (trim($prod1) == "" && trim($prod2) == "" && trim($prod3) == ""){
			$errors = "$errors Please purchase a product.<br/>";
		} else if (is_nan(intval(trim($prod1))) || is_nan(intval(trim($prod2))) || is_nan(intval(trim($prod3)))){
			$errors = "$errors Product needs to be a number.<br/>";
		}
	}

	function setZero($arg){
		if (trim($arg) == "" || is_null($arg)){
			return 0;
		} else {
			return $arg;
		}
	}

	function printInvoice(){

		global $name, $email, $phone, $address, $city, $province, 
		$postcode, $prod1, $prod2, $prod3, $dTime, $salesTax;

		$prod1 = setZero($prod1);
		$prod2 = setZero($prod2);
		$prod3 = setZero($prod3);

		$prod1_total = intval($prod1) * 10;
		$prod2_total = intval($prod2) * 20;
		$prod3_total = intval($prod3) * 30;
		$shipCost = floatval($dTime);
		$subTotal = $prod1_total + $prod2_total + $prod3_total + $shipCost;
		$tax_rate = intval($salesTax[$province]*100);
		$tax = $salesTax[$province]*$subTotal; 
		$total = $tax + $subTotal;	

		include("header.php");

		echo "<table>";
		//echo "<tr><td>Name : </td><td align='right'>$name</td></tr>";
		//echo "<tr><td>Email : </td><td align='right'>$email</td></tr>";
		//echo "<tr><td>Phone : </td><td align='right'>$phone</td></tr>";
		echo "<tr><td>Delivery Address : </td><td align='right'>$address<br/> $city<br/> $province<br/> $postcode<br/></td></tr>";
		echo "<tr><td>$prod1 Product 1 @ $10 : </td><td align='right'>$$prod1_total </td></tr>" ;
		echo "<tr><td>$prod2 Product 2 @ $20 : </td><td align='right'>$$prod2_total </td></tr>" ;
		echo "<tr><td>$prod3 Product 3 @ $30 : </td><td align='right'>$$prod3_total </td></tr>" ;
		echo "<tr><td>Shipping Charges : </td><td align='right'>$$shipCost </td></tr>";
		echo "<tr><td>Subtotal : </td><td align='right'>$$subTotal</td></tr>";
		echo "<tr><td>Taxes @ $tax_rate% : </td><td align='right'>$$tax</td></tr>";
		echo "<tr><td>Total : </td><td align='right'>$$total</td></tr>";
		echo "</table>";

		include("footer.php");
	}
	
?>
</div>

<?php
	$username = $_SESSION['name'];
	$sql = "INSERT INTO 
		orders 
		(order_id, username, address, city, postal_code, province, num_prod_1, num_prod_2, num_prod_3, delivery_time, order_date) 
		VALUES 
		(NULL, '$username', '$address', '$city', '$postcode', '$province', '$prod1', '$prod2', '$prod3', '$dTime', CURRENT_TIMESTAMP);";
	if($db->query($sql)){
        ?><div id='success'>Record Created Successfully!</div><?php
    } else {
    	echo $db->error;
    }
?>
