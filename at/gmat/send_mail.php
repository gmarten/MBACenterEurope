<?php
	//$to = "clement.hadjeres@gmail.com;hubert@mbacentereurope.eu;mehdi@mbacentereurope.eu"; /*Your Email*/
	$to = "gunther@mbacentereurope.eu"; /*Your Email*/
	//$subject = "Messsage from the GMAT landing"; /*Issue*/
	$subject = "send_mail.php"; /*Issue*/
	$date = date ("l, F jS, Y"); 
	$time = date ("h:i A"); 
	
		
	$Email= $_REQUEST['Email'];
	$firstName = $_REQUEST['Firstname'];
	$lastName = $_REQUEST['Lastname'];
	$country = $_REQUEST['Country'];
	$Phone = $_REQUEST['Phone'];
	

	$msg="
	Name: $firstName $lastName
	Email: $Email
	Country: $country
	Courses: $_REQUEST[courses]
	Phone: $_REQUEST[Phone]
	
	
	Message sent from website on date  $date, hour: $time.\n
	
	$_REQUEST[Message]";

	if ($Email=="") {
		echo "<div class='alert alert-error'>
  				<a class='close' data-dismiss='alert'>×</a>
  				<strong>Warning!</strong> Please enter your email.
			</div>
		
		";
	}	
	elseif ($Phone=="" or $firstName=="" or $lastName=="" or $country=="") {
		echo "<div class='alert alert-error'>
  				<a class='close' data-dismiss='alert'>×</a>
  				<strong>Warning!</strong> Please fill all the fields.
			</div>";
	}	
	else{
		mail($to, $subject, $msg, "From: $_REQUEST[Email]");
		echo "<div class='alert alert-success'>
  				<a class='close' data-dismiss='alert'>×</a>
  				<strong>Thank you for your message!</strong>
			</div>
		
		
		";	
	}
	
?>
