<?php
if(!isset($_SESSION)) session_start();

require_once($_SERVER['DOCUMENT_ROOT'] . "/managers/userManager.php");
require_once($_SERVER['DOCUMENT_ROOT'] . "/managers/coursManager.php");


if(isset($_POST['action']))
{
	switch($_POST['action'])
	{
		case 'selectAll' : $userManager = new UserManager();
						   //print_r($userManager->selectAll());
						   break;
		case 'recherche' :  $userManager = new UserManager();	
						    echo json_encode($userManager->listeUserByName($_POST['nom']));
						    break;
		case  'listeDeroulante' : $coursManager = new CoursManager();
								  echo json_encode($coursManager->selectAll());
								  break;				  
		case 'student_parcours' : $userManager = new UserManager();
								  echo json_encode($userManager->utilisateurParcours($_POST['id_cours']));
								  break;								  
	}
}

?>