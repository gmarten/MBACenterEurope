<?php
	$Email= isset($_REQUEST['Email']) ? $_REQUEST['Email'] : '';
    $Name = isset($_REQUEST['Name']) ? $_REQUEST['Name'] : '';
    $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';

    // compose email
    $to = "gunther@mbacentereurope.eu"; /*Your Email*/
    $subject = "Suscription from the $page landing page - Newsletter "; /*Issue*/
    $date = date ("l, F jS, Y");
    $time = date ("h:i A");

	$msg="
	Name: $Email
	Email: $Name
	
	Suscription from website on date  $date, hour: $time.";

	if ($Email=="" or !filter_var($Email, FILTER_VALIDATE_EMAIL)) {
		echo "<div class='alert alert-error'>
  				<a class='close' data-dismiss='alert'>×</a>
  				<strong>Warning!</strong> Please enter your email.
			</div>
		";
	}	
	else{
		mail($to, $subject, $msg, "From: $Email");
		echo "<div class='alert alert-success'>
  				<a class='close' data-dismiss='alert'>×</a>
  				<strong>Thank you for your Suscription!</strong>
			</div>
		";
	}
	
?>
