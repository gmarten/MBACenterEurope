<?php
if(!isset($_SESSION)) session_start();

define('DOCROOT', $_SERVER['DOCUMENT_ROOT'].'/');

require_once(DOCROOT . "managers/userManager.php");
require_once(DOCROOT . "managers/employeManager.php");
require_once(DOCROOT . "managers/connexionSingleton.php");
require_once(DOCROOT . "objets/user.php");
require_once(DOCROOT . "objets/employe.php");

if(isset($_POST['action']))
{
		if($_POST['action']=='mail_verif')
		{
			$userManager = new UserManager();
			$employeManager = new EmployeManager();
			//var_dump($userManager->emailDispo($_POST['email']));
			if(($userManager->emailDispo($_POST['email'])||($employeManager->emailDispo($_POST['email']))))
			{
				// var_dump($userManager->emailDispo($_POST['email']));
				// var_dump($employeManager->emailDispo($_POST['email']));
				echo json_encode(true);
			}
			else
			{
				// var_dump($userManager->emailDispo($_POST['email']));
				// var_dump($employeManager->emailDispo($_POST['email']));
				echo json_encode(false);
			}
			    // var_dump($userManager->emailDispo($_POST['email']));
				// var_dump($employeManager->emailDispo($_POST['email']));
		}
		if($_POST[action]=='facebook_connect')
		{
			$userManager = new UserManager();
			$employeManager = new EmployeManager();
			
			if(($userManager->emailDispo($_POST['email'])))
			{
				$result = $userManager->emailDispo($_POST['email']);
				$user=$userManager->connexionUserFacebook($result['password'],$_POST['email']);
				$_SESSION['user']=true;
			    //echo "session user ".$_SESSION['user'];
				$_SESSION['id_user']=$user['id_user'];
				$_SESSION['email_user']=$user['email'];
				$_SESSION['nom']=$user['nom'];
				//echo "session nom ". $_SESSION['nom'];
				//echo $user['password'];
				//print_r($userManager->connexionUserFacebook($user['password'],$_POST['email']));
				echo json_encode($userManager->connexionUserFacebook($result['password'],$_POST['email']));
			}
			elseif(($employeManager->emailDispo($_POST['email'])))
			{
				$result = $employeManager->emailDispo($_POST['email']);
				$emp = $userManager->connexionEmpFacebook($result['password'],$_POST['email']);
				$_SESSION['employe']=true;		
				//echo $_SESSION['employe'];
				$_SESSION['id_employe']=$emp['id_employe'];
				//echo $_SESSION['id_employe'];
				$_SESSION['email_employe']=$emp['email'];
				//echo $_SESSION['email_employe'];
				//echo $_SESSION['email_employe'];
				$_SESSION['nom']=$emp['nom'];
				//echo $_SESSION['nom'];
				echo json_encode($userManager->connexionEmpFacebook($result['password'],$_POST['email']));
			}
			else//if(!($employeManager->emailDispo($_POST['email']))&&($userManager->emailDispo($_POST['email'])))
			{
				
				session_start();
				$_SESSION=array();
				session_destroy();
				if($_POST['employe']=="false")
				{
					
					$userManager = new UserManager();
					$user = new User(array(
							'nom'=>$_POST['nom'],
							//'prenom'=>$_POST['new_account_prenom'],
							'email'=>$_POST['email']));
							$userManager->add($user);
				}
				else
				{
					$employeManager = new EmployeManager();
					$employe = new Employe(array(
						'nom'=>$_POST['nom'],
						//'prenom'=>$_POST['new_account_prenom'],
						'email'=>$_POST['email']));
						
						//envoyer mail
						$headers ='From: hubert@mbacentereurope.eu'."\n";
						$headers .='Reply-To: hubert@mbacentereurope.eu'."\n";
						$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
						$headers .='Content-Transfer-Encoding: 8bit';			
						mail('ax_sz@hotmail.com', 'Activation du compte employé', 'Bonjour Hubert M/Mme'. $_POST['new_account_name'] .' a besoin que tu actives son compte pour lui permettre de se connecter.  Tu peux le faire en cliquant sur ce lien : <a href="http://mbacentereurope.eu/profil_activation_hubert.php?email='.$_POST['new_account_email'].'>lien</a>', $headers); 
						include("slider-form.php");
						$employeManager->add($employe);
				}
				echo json_encode(true);
			}
		}
		if($_POST['action']=='ajouter')
		{
			session_start();
			$_SESSION=array();
			session_destroy();
			if($_POST['employe']=="false")
			{
				$userManager = new UserManager();
				
				$user = new User(array(
						'nom'=>$_POST['new_account_name'],
						//'prenom'=>$_POST['new_account_prenom'],
						'email'=>$_POST['new_account_email'],
						'password'=>$_POST['new_account_password']));
						echo json_encode($userManager->add($user));	
			}
			else
			{
				$employeManager = new EmployeManager();
				$employe = new Employe(array(
					'nom'=>$_POST['new_account_name'],
					//'prenom'=>$_POST['new_account_prenom'],
					'email'=>$_POST['new_account_email'],
					'gsm'=>$_POST['new_account_cellular'],
					'password'=>$_POST['new_account_password']));
					
					//envoyer mail
					$headers ='From: hubert@mbacentereurope.eu'."\n";
					$headers .='Reply-To: hubert@mbacentereurope.eu'."\n";
					$headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
					$headers .='Content-Transfer-Encoding: 8bit';			
					mail('ax_sz@hotmail.com', 'Activation du compte employé', 'Bonjour Hubert M/Mme'. $_POST['new_account_name'] .' a besoin que tu actives son compte pour lui permettre de se connecter.  Tu peux le faire en cliquant sur ce lien : <a href="http://mbacentereurope.eu/profil_activation_hubert.php?email='.$_POST['new_account_email'].'>lien</a>', $headers); 
					
					include("slider-form.php");
					echo json_encode($employeManager->add($employe));	
			}
		}
		else
		{
			if($_POST['action']=='connection')
			{
				$userManager= new UserManager();
				//echo "hello1";
				$user = $userManager->connexionUser($_POST['password'],$_POST['email']);
				$emp = $userManager->connexionEmp($_POST['password'],$_POST['email']);
				if($user==false)
				{
					if($emp==false)
					{
						$result=false;
					}
					else
					{
						$_SESSION['employe']=true;		
						//echo $_SESSION['employe'];
						$_SESSION['id_employe']=$emp['id_employe'];
						//echo $_SESSION['id_employe'];
						$_SESSION['email_employe']=$emp['email'];
						//echo $_SESSION['email_employe'];
						//echo $_SESSION['email_employe'];
						$_SESSION['nom']=$emp['nom'];
						//echo $_SESSION['nom'];
						$result=$emp;
					}
				}
				else
				{
					$result=$user;
					$_SESSION['user']=true;
					//echo "session user ".$_SESSION['user'];
					$_SESSION['id_user']=$user['id_user'];
					$_SESSION['email_user']=$user['email'];
					$_SESSION['nom']=$user['nom'];
					//echo "session nom ". $_SESSION['nom'];
				}
				if(($user==false)&&($emp==false))
				{
					echo json_encode(false);
				}
				else
				{
					echo json_encode($result);
				}
			}
		}
}

?>