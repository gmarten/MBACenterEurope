<?php
if(!isset($_SESSION)) session_start();
require_once('../managers/userManager.php');

if(isset($_POST['action']))
{
	switch($_POST['action'])
	{
		case 'affichage_data_user_from_emp' : $userManager = new UserManager();
											  echo json_encode($userManager->getDataUserByIdFromEmp($_POST['id']));
											  break;
		case 'affiche_score' : $userManager = new UserManager();
								echo json_encode($userManager->afficheScore($_POST['id_user']));
								break;
		case 'sauver_changement_user_from_emp' : $userManager = new UserManager();
												 echo json_encode($userManager->updateDataUserFromEmp($_POST['comments'],$_POST['id_user_from_emp']));
												 break;
	}
}
?>