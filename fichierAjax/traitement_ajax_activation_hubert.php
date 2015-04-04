<?php  
if(!isset($_SESSION)) session_start();
require_once('../managers/employeManager.php');

if(isset($_POST['action']))
{
	switch($_POST['action'])
	{
		case 'activation_emp' : $empManager = new EmployeManager();
								echo json_encode($empManager->activationEmploye($_POST['email']));
								break;
	}
}

?>