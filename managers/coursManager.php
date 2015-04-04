<?php
if(!isset($_SESSION)) session_start();

//spl_autoload_register();

require_once $_SERVER['DOCUMENT_ROOT'] . "/managers/connexionSingleton.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/objets/cours.php";

class CoursManager{
function hello()
{
	echo "hello";
}
function selectCoursByUsers()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$email_user=$_SESSION['email_user'];
	//$test='hello from this place';
	$intitule=$cours->getIntitule();
	$select=$connexion->prepare('select intitule, date from userparcours where intitule=:intitule and email=:email');
	$select->bindValue(':intitule',$intitule);
	$select->bindValue(':email',$email_user);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	return $result;
}
function add(Cours $cours)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$email_user=$_SESSION['email_user'];
	//$test='hello from this place';
	$intitule=$cours->getIntitule();
	$select=$connexion->prepare('select email from userparcours where intitule=:intitule and email=:email');
	$select->bindValue(':intitule',$intitule);
	$select->bindValue(':email',$email_user);
	$select->execute();
	$result=$select->fetch(PDO::FETCH_ASSOC);
	//var_dump($result);
	//print_r($connexion->errorCode());
	//echo "le premier ".count($result)." result val ".$result['email'];
	if($result==false)
	{
		//echo "le deuxième ".count($result);
		$insert = $connexion->prepare('INSERT INTO cours (intitule, date_cours) VALUES (:intitule,:date)');
		$success = $insert->execute(array(
			':intitule'=>$intitule,
			':date'=>$cours->getDate()
		));
		$lastId = $connexion->lastInsertId();
		// echo $lastId;
		// var_dump($success);
		if($success)
		{
			// echo $cours->getId_ecole();
			$insert = $connexion->prepare('INSERT INTO cours_has_ecole (id_cours,id_ecole) VALUES (:id_cours,:id_ecole)');
			$success = $insert->execute(array(
				':id_ecole'=>$cours->getId_ecole(),
				':id_cours'=>$lastId
			));
			//print_r($success);
			//return $success;
			if($success)
			{
				// return $result;
				$insert = $connexion->prepare('INSERT INTO users_has_cours (id_user,id_cours) VALUES (:id_user,:id_cours)');
				$success_users_has_cours = $insert->execute(array(
					':id_user'=>$_SESSION['id_user'],
					':id_cours'=>$lastId
				));	
			}
		}
	}
	return true;
}

function selectAll()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select * from cours');
	$select->execute();
	$result=$select->fetchAll();
	return $result;
}

}

?>