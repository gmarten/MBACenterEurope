<?php  
	require_once('../managers/userManager.php');
	$usersManager = new UserManager();
	$result = $usersManager->listeCoursByUser();
	$auj = date("Ymd");
	for($i=0;$i<count($result);$i++)
	{
		usleep(2000000);
		if(2==$usersManager->nbJours($auj,$result[$i]['date_cours']))
		{
			$text = 'Vous avez un cours dans deux jours';
			$url = 'https://sms.lws-hosting.com/api/sendsms/'.
			'ax_sz@hotmail.com/'. 
			'44BplUtUhO/'. 
			'json/' .
			'36004/'.
			''.$result[$i]['gsm'].'/'.
			'/'. urlencode($text) ;
						
			$response = @file_get_contents($url);
			//var_dump($response);
			if ($response != 'Error'){
			echo json_encode('votre sms est envoye');
			} else {
			echo json_encode('Erreur:'.$response);
			}
		}
	}
	//sms_lws("ax_sz@hotmail.com","44BplUtUhO", "Mars à la base, Mars à la base, vous me recevez ?","36004","32489597961");
	
?>