<?php
if(!isset($_SESSION)) session_start();
//echo "hello ajax";
require_once('../managers/employeManager.php');
require_once('../managers/userManager.php');
require_once('../managers/connexionSingleton.php');
require_once('../objets/user.php');
require_once('../objets/employe.php');

if(isset($_POST['action']))
{	
	switch($_POST['action'])
	{
		case 'save_school_orientation' : $userManager= new UserManager();
										 $tab_apply_prog = array(
											1=>$_POST['MBA'],
											2=>$_POST['EMBA'],
											3=>$_POST['MS'],
											4=>$_POST['PhD']
										 );		 
										 $tab_apply_school = array(
											0=>$_POST['applyied_school_1'],
											1=>$_POST['applyied_school_2'],
											2=>$_POST['applyied_school_3'],
											3=>$_POST['applyied_school_4'],
											4=>$_POST['applyied_school_5']
										 );
										 echo json_encode($userManager->updateFormSchoolOrientation($tab_apply_prog,$tab_apply_school,$_POST['work_industry'],$_POST['id_user']));
										 break;
										 
		case 'affiche_planned_school' :     $userManager = new UserManager();	
											echo json_encode($userManager->afficheApplyedSchool($_POST['id_user']));
											break;
											
		case 'affiche_score' : $userManager = new UserManager();
								echo json_encode($userManager->afficheScore($_POST['id_user']));
								break;
		case 'affichage_data_user' : $userManager = new UserManager();
									 echo json_encode($userManager->getDataUserById($_POST['id']));
									 break;
		case 'affichage_data_emp' :  $empManager = new EmployeManager();
									 echo json_encode($empManager->getDataEmpById($_POST['id']));
									 break;	
		case 'save_data_work_history' :   $userManager = new UserManager();
										  echo json_encode($userManager->updateUserFormWorkHistory($_POST['annee_deb'],$_POST['annee_fin'],$_POST['current_job'],$_POST['id']));
										  break;
		case 'save_data_education' :    $userManager = new UserManager();
										$tab_education=array('high_grade'=>$_POST['high_grade'],
											  'area_study'=>$_POST['area_study'],
											  'gmat_score'=>$_POST['gmat_score'],
											  'gre_score'=>$_POST['gre_score'],
											  'toefl_score'=>$_POST['toefl_score'],
											  'mcat_score'=>$_POST['mcat_score'],
											  'lsat_score'=>$_POST['lsat_score'],
											  'admission_consulting'=>$_POST['admission'],
											  'id_user'=>$_SESSION['id_user']);
										$tab_planed_test = array(
											'gmat'=>$_POST['gmat'],
											'gre'=>$_POST['gre'],
											'toefl'=>$_POST['toefl'],
											'lsat'=>$_POST['lsat'],
											'mcat'=>$_POST['mcat']
										);
										echo json_encode($userManager->updateUserFormEducation($tab_education,$tab_planed_test));
										break;
		case 'sauver_changement_user' : $userManager = new UserManager();
										$user = new User(array(
										'id_user'=>$_SESSION['id_user'],
										'nom'=>$_POST['name'],
										'prenom'=>$_POST['surname'],
										'gsm'=>$_POST['gsm'],
										'adress'=>$_POST['adress'],
										'genre'=>$_POST['genre'],
										'location'=>$_POST['location'],
										'birth_date'=>$_POST['anniversaire'],
										'military_status'=>$_POST['military']					
										));
										echo json_encode($userManager->updateUserFormPersonalInfo($user));
										break;
		case 'sauver_changement_emp' :  $empManager = new EmployeManager();
										//echo "hello";
										$employe = new Employe(array(
											'nom'=>$_POST['name'],
											'prenom'=>$_POST['surname'],
											'adress'=>$_POST['adress'],
											'gsm'=>$_POST['gsm'],
											'genre'=>$_POST['genre'],
											'date_naiss'=>$_POST['anniversaire'],
											'military_status'=>$_POST['military']
										));
										//echo "avant ammploye";
										//echo json_encode($empManager->updateDataEmp($_POST['nom'],$_SESSION['id_employe']));
										echo json_encode($empManager->updateDataEmp($employe,$_SESSION['id_employe']));
										break;
		case 'changement_password_user' : $userManager = new UserManager();
										  echo json_encode($userManager->modifNouveauMotPasse($_POST['current_password'],$_POST['new_password'],$_SESSION['email_user']));
										  break;
		case 'changement_password_emp' :  $empManager = new EmployeManager();
										  echo json_encode($empManager->modifNouveauMotPasse($_POST['current_password'],$_POST['new_password'],$_SESSION['email_employe']));
										  break;
		case 'verif_connexion_emp' :	$empManager = new EmployeManager();   
										echo json_encode($empManager->connexionEmploye($_POST['mp1'],$_SESSION['email_employe']));
										break;
		case 'verif_connexion_user' :   $userManager = new UserManager();
										echo json_encode($userManager->connexionUser($_POST['mp1'],$_SESSION['email_user']));
										break;
	}
}
?>