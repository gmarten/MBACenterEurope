<?php
include('header.php');

/*$name = $_POST['MBA CENTER HOME'];
$email = $_POST['slider-email'];
$studyLevel = $_POST['slider-study-level'];
$course = $_POST['slider-course'];
 
//$to = 'laurene@mbacentereurope.eu';
//$to = 'ax_sz@hotmail.com';
$to = 'gunther@mbacentereurope.eu';
//$subject = 'You Have New Subscriber from MBA CENTER EUROPE !';
$subject = 'slider-form.php';

$body = "";
$body .= "Name: ";
$body .= $name;
$body .= "\n\n";

$body .= "";
$body .= "Email: ";
$body .= $email;
$body .= "\n";

$body .= "";
$body .= "Study Level: ";
$body .= $studyLevel;
$body .= "\n";

$body .= "";
$body .= "Selected Course: ";
$body .= $course;
$body .= "\n";

$headers = 'From: ' .$email . "\r\n";

$headers = 'From: noreply@domain.com' . "\r\n";

//$body .= "";
//$body .= "Email: ";
//$body .= $email;
//$body .= "\n";
*/

	$to = "clement.hadjeres@gmail.com;hubert@mbacentereurope.eu;mehdi@mbacentereurope.eu"; /*Your Email*/
	$subject = "Messsage from the GMAT landing"; /*Issue*/
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
	
if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
	mail($to, $subject, $msg, "From: $_REQUEST[Email]");
	include('thanks.php');
}else{
	include('not.php');
}
/*
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
	mail($to, $subject, $body, $headers);
	include('thanks.php');
}else{
	include('not.php');
}*/

include('footer.php');
