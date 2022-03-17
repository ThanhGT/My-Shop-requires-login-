//validates the data and displays the errors if any
//if there are no errors then the php script is executed
function validateForm(form){

	var errors = "";

	var postalcodeRegex = /^[A-Z][0-9][A-Z]\s[0-9][A-Z][0-9]$/;
	//var phoneRegex = /^[0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	//var emailRegex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	//var name = form.name.value;
	//var email = form.email.value;
	//var phone = form.phone.value;
	var address = form.address.value;
	var city = form.city.value;
	var postalcode = form.postalcode.value;

	//get the province
	var province = document.getElementById("province").value;

	//dictionary of the province sales taxes
	$salesTax = {"AB":0.05,"BC":0.05,"MB":0.05,"NB":0.15,"NL":0.15,"NT":0.05,"NS":0.15,"NU":0.05,"ON":0.13,"QC":0.05,"PE":0.15,"SK":0.05,"YT":0.05};
	
	/*
	// validate name
	if(name.trim() == ""){
		errors += "You need to enter a name!<br/>";
	}*/

	/*
	// validate email
	if(email.trim() == ""){
		errors += 'You need to enter an email!<br/>';
	} else if (!(emailRegex.test(email))){
		errors += 'Email is not in the correct format!<br/>';
	}*/
	
	/*
	// validate phone
	if(phone.trim() == ""){
		errors += 'You need to enter a phone number!<br/>';
		} else if(!(phoneRegex.test(phone))){
			errors += 'Phone Number is not in the correct format<br/>';
	}*/

	// validate address
	if (address.trim() == ""){
		errors += "You need to enter an address!<br/>";
	}
	
	// validate city
	if(city.trim() == ""){
		errors += 'You need to enter a city<br/>';
	}

	// validate postal code
	if(!(postalcodeRegex.test(postalcode))){
		errors += 'Postal Code not in correct format!<br/>';
	}
	
	var subtotal = 0;
	
	// validate products
	var products = document.getElementsByClassName("prod");
	
	var counter = 0;
	for (let i = 0; i < products.length; i++){
		if (products[i].value.trim() == ""){
			counter++;
		//check if any of the product boxes have invalid inputs
		} else if (isNaN(products[i].value)) {
			errors += "Product needs to be a number.<br/>";
			break;
		}
	}
	
	//check if the product boxes are empty
	if (counter == products.length) {
		errors += "Please purchase a product.<br/>"
	}

	if (errors.trim() != ""){
		document.getElementById("errors").innerHTML = errors;
	} else {
		form.submit();
	}

}
//validate everything with js - 
//make the sql database - 
//make a php file that tabulates the database and displays it when the user hits "View all orders" - 
// make the form submit the data to the database - 
//make sure all the requirements are filled