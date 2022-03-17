<?php 
	include("header.php"); 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "store";

    $db = new mysqli($servername, $username, $password, $dbname);

    if($db->connect_error){
        die("Connection failed: " . $db->connect_error);
    }
    session_start()
?>
		<h1 id="heading">MY SHOP</h1>
		<?php ?>
		<div id="errors"></div>
		<form id="myform" method="post" action="process.php">
			<div class="questions">
				<!--<div>NAME*:</div><div><input type="text" name="name"></input></div>
				<div>EMAIL*:</div><div><input type="email" name="email"></input></div>
				<div>PHONE*:</div><div><input type="text" name="phone"></input></div>-->
				<div>ADDRESS*:</div><div><input type="text" name="address"></input></div>
				<div>CITY*:</div><div><input type="text" name="city"></input></div>
				<div>POSTAL CODE*:</div><div><input type="text" name="postalcode"></input></div>
				<div>PROVINCE*:</div>
				<div>
					<select name="province" id="province">
							<option value = "BC">British Columbia</option>
							<option value = "AB">Alberta</option>
							<option value = "SK">Saskatchewan</option>
							<option value = "MB">Manitoba</option>
							<option value = "ON">Ontario</option>
							<option value = "QC">Quebec</option>
							<option value = "NB">New Brunswick</option>
							<option value = "PE">Prince Edward Island</option>
							<option value = "NS">Nova Scotia</option>
							<option value = "NL">Newfoundland</option>
							<option value = "YT">Yukon</option>
							<option value = "NT">Northwest Territories</option>
							<option value = "NU">Nunavut</option>
					</select>
				</div>
				<div>PRODUCT 1:</div><div><input type="text" name="product1" class="prod"></input></div>
				<div>PRODUCT 2:</div><div><input type="text" name="product2" class="prod"></input></div>
				<div>PRODUCT 3:</div><div><input type="text" name="product3" class="prod"></input></div>
				<div>DELIVERY TIME:</div>
				<div>
					<select name="dTime" id="dTime" required>
						<option value = "30">1 DAY</option>
						<option value = "25">2 DAYS</option>
						<option value = "20">3 DAYS</option>
						<option value = "15">4 DAYS</option>
					</select>
				</div>
			</div>
			<span class="submitbutton"><button type="button" onclick=<?php
				if (!(isset($_SESSION["user_id"])) || !(isset($_SESSION["role"]))){
					echo "\"alert('Log in to place an order.'); window.location.href = 'login.php';\"";
				} else {
					echo "\"validateForm(form);\"";
				}
			?>>CREATE ORDER</button></span>
			<!--<div class="submitbutton"><button type="submit" formaction="sql/database.php">VIEW ALL ORDERS</button></div>-->
		</form>
<?php include("footer.php") 
//make it work -> don't let the user order unless they're logged in  -> sure but it doesn't redirect to the login page
//
?>