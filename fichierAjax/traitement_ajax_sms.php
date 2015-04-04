<?php
if(!isset($_SESSION)) session_start();
	require_once("../objets/cours.php");
	require_once("../managers/coursManager.php");
	
	if(isset($_POST['action']))
	{
		switch($_POST['action'])
		{
			case 'ajoutercours' : $cours=new Cours(array(
									'intitule'=>$_POST['cours'],
									'date'=>$_POST['date']
								));
								$coursManager = new coursManager();
								echo json_encode($coursManager->add($cours));
								break;
		}
	}
?>