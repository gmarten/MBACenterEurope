<?php
	if(!isset($_SESSION)) session_start();
	require_once('../managers/userManager.php');
	if(isset($_POST['action']))
	{
		switch($_POST['action'])
		{
			case 'envoiSms' :   $text = $_POST['text'];
								$url = 'https://sms.lws-hosting.com/api/sendsms/'.
								'ax_sz@hotmail.com/'. 
								'44BplUtUhO/'. 
								'json/' .
								'36004/'.
								''.$_POST['gsm'].'/'.
								'/'. urlencode($text) ;

								$response = @file_get_contents($url);

								if ($response != 'Error'){
								echo 'votre sms est envoye';
								} else {
								echo 'Erreur:'.$response;
								}
								break;
		}
	//sms_lws("ax_sz@hotmail.com","44BplUtUhO", "Mars à la base, Mars à la base, vous me recevez ?","36004","32489597961");
	}
?>
