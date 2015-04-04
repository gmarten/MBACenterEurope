<?php
	/*------------ VERIFY IF THE ENTERED VALUES ARE CORRECT -------------*/

    $Email= isset($_REQUEST['Email']) ? $_REQUEST['Email'] : '';
	$firstName = isset($_REQUEST['Firstname']) ? $_REQUEST['Firstname'] : '';
	$lastName = isset($_REQUEST['Lastname']) ? $_REQUEST['Lastname'] : '';
	$country = isset($_REQUEST['Country']) ? $_REQUEST['Country'] : '';
	$Phone = isset($_REQUEST['Phone']) ? $_REQUEST['Phone'] : '';

    // verify email format is correct

	if ($Email=="" or $Phone=="" or $firstName=="" or $lastName=="" or $country=="") {
		echo "<div class='alert alert-error'>
  				<a class='close' data-dismiss='alert'>×</a>
  				<strong>Warning!</strong> Please fill all the fields.
			</div>";
	}
    elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        echo "<div class='alert alert-error'>
                <a class='close' data-dismiss='alert'>×</a>
                <strong>Warning!</strong> Please enter a correct email address.
            </div>";
    }
	else{
		echo "true";
	}
	
?>
