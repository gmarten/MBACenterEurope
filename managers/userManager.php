<?php
if(!isset($_SESSION)) session_start();
//spl_autoload_register();

/*
require_once(DOCROOT . "managers/connexionSingleton.php");
require_once(DOCROOT . "objets/user.php");
*/
require_once($_SERVER['DOCUMENT_ROOT'] . "/managers/connexionSingleton.php");

require_once($_SERVER['DOCUMENT_ROOT'] . "/objets/user.php");

class UserManager{

function hello()
{
	echo "hello";
}

function listeUserByName($name)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select nom, biographie, location, comments,gsm,id_user from users where nom=:nom');
	$select->bindParam(':nom',$name);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	return $result;	
}

function generatePassword($length = 8) {
        $possibleChars = "abcdefghijklmnopqrstuvwxyz";
        $password = '';

        for($i = 0; $i < $length; $i++) {
            $rand = rand(0, strlen($possibleChars) - 1);
            $password .= substr($possibleChars, $rand, 1);
        }

        return $password;
}
function add(User $user)
{
	$db=connection::getInstance();
    $connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $insert = $connexion->prepare('INSERT INTO users(
									nom,prenom,email,password,comments,gsm,location,type) 
									VALUES(:nom,:prenom,:email,:password,:comment,:gsm,:location,:type)');
	$success = $insert->execute(array(
	    ':nom'=>$user->getNom(),
	    ':prenom'=>$user->getPrenom(),
		':email'=>$user->getEmail(),
		':password'=>$user->getPassword(),
		':comment'=>$user->getComment(),
	    ':gsm'=>$user->getGsm(),
		':location'=>$user->getLocation(),
		':type'=>$user->getType()
	));
	$lastId = $connexion->lastInsertId();
	if($success)
	{
		$_SESSION['user']=true;
		$_SESSION['id_user']=$lastId;
		$_SESSION['email_user']=$user->getEmail();
		$_SESSION['nom']=$user->getNom();
	}
	
	/****  test_planed  ***/
	$insert = $connexion->prepare('INSERT INTO `user_has_planed_test`(`id_user`, `id_test` ,`taken`) VALUES (:id_user, :id_test, :taken)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',1);
	$insert->bindValue(':taken',false);
	$success_test_planed = $insert->execute();
	
	$insert = $connexion->prepare('INSERT INTO `user_has_planed_test`(`id_user`, `id_test`,taken) VALUES (:id_user,:id_test,:taken)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',2);
	$insert->bindValue(':taken',0);
	$success_test_planed = $insert->execute();

	$insert = $connexion->prepare('INSERT INTO `user_has_planed_test`(`id_user`, `id_test`,taken) VALUES (:id_user,:id_test,:taken)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',3);
	$insert->bindValue(':taken',0);
	$success_test_planed = $insert->execute();
	
	$insert = $connexion->prepare('INSERT INTO `user_has_planed_test`(`id_user`, `id_test`,taken) VALUES (:id_user,:id_test,:taken)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',4);
	$insert->bindValue(':taken',0);
	$success_test_planed = $insert->execute();
	
	$insert = $connexion->prepare('INSERT INTO `user_has_planed_test`(`id_user`, `id_test`,taken) VALUES (:id_user,:id_test,:taken)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',5);
	$insert->bindValue(':taken',0);
	$success_test_planed = $insert->execute();

	/***  user has score ***/
	
	$insert = $connexion->prepare('INSERT INTO `user_has_score`(`id_user`, `id_test`, `score`) VALUES (:id_user,:id_test,:score)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',1);
	$insert->bindValue(':score',0);
	$success_test_planed = $insert->execute();

	$insert = $connexion->prepare('INSERT INTO `user_has_score`(`id_user`, `id_test`, `score`) VALUES (:id_user,:id_test,:score)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',2);
	$insert->bindValue(':score',0);
	$success_test_planed = $insert->execute();

	$insert = $connexion->prepare('INSERT INTO `user_has_score`(`id_user`, `id_test`, `score`) VALUES (:id_user,:id_test,:score)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',3);
	$insert->bindValue(':score',0);
	$success_test_planed = $insert->execute();
	
	$insert = $connexion->prepare('INSERT INTO `user_has_score`(`id_user`, `id_test`, `score`) VALUES (:id_user,:id_test,:score)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',4);
	$insert->bindValue(':score',0);
	$sucess_test_planed = $insert->execute();

	$insert = $connexion->prepare('INSERT INTO `user_has_score`(`id_user`, `id_test`, `score`) VALUES (:id_user,:id_test,:score)');
	$insert->bindValue(':id_user',$lastId);
	$insert->bindValue(':id_test',5);
	$insert->bindValue(':score',0);
	$sucess_test_planed = $insert->execute();
	
	/***  candidature program  ***/
	
	for($i=1;$i<=4;$i++)
	{
		$insert = $connexion->prepare('INSERT INTO `user_has_candidature_program`(`id_user`, `id_program`, `taken`) VALUES (:id_user,:id_program,:taken)');
		$insert->bindValue(':id_user',$lastId);
		$insert->bindValue(':id_program',$i);
		$insert->bindValue(':taken',0);
		$sucess_test_planed = $insert->execute();
		
	}
	for($i=0;$i<=4;$i++)
	{
		$j=$i+1;
		$insert = $connexion->prepare('INSERT INTO `user_has_cand_ecole`(`id_user`, `id_ecole`,no_ligne) VALUES (:id_user,:id_ecole,:no_ligne)');
		$insert->bindValue(':id_user',$lastId);
		$insert->bindValue(':id_ecole',0);
		$insert->bindValue(':no_ligne',$j);
		$success = $insert->execute();	
	}
	return $success;
}
function chargerUnif()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare("insert into candidature_ecole (ecole_nom) values ('Harvard Business School');
		insert into candidature_ecole (ecole_nom) values ('London Business School');
		insert into candidature_ecole (ecole_nom) values ('University of Pennsylvania, Wharton');
		insert into candidature_ecole (ecole_nom) values ('Stanford Graduate School of Business');
		insert into candidature_ecole (ecole_nom) values ('Insead');
		insert into candidature_ecole (ecole_nom) values ('Columbia Business School');
		insert into candidature_ecole (ecole_nom) values ('Iese Business School');
		insert into candidature_ecole (ecole_nom) values ('MIT Sloan');
		insert into candidature_ecole (ecole_nom) values ('University of Chicago Booth');
		insert into candidature_ecole (ecole_nom) values ('Berkeley Haas');
		insert into candidature_ecole (ecole_nom) values ('Ceibs');
		insert into candidature_ecole (ecole_nom) values ('IE Business School');
		insert into candidature_ecole (ecole_nom) values ('Cambridge Judge Business School');
		insert into candidature_ecole (ecole_nom) values ('HKUST Business School');
		insert into candidature_ecole (ecole_nom) values ('Northwestern University Kellogg');
		insert into candidature_ecole (ecole_nom) values ('HEC Paris');
		insert into candidature_ecole (ecole_nom) values ('Yale School of Management');
		insert into candidature_ecole (ecole_nom) values ('New York University Stern');
		insert into candidature_ecole (ecole_nom) values ('Esade Business School');
		insert into candidature_ecole (ecole_nom) values ('IMD');
		insert into candidature_ecole (ecole_nom) values ('Duke University Fuqua');
		insert into candidature_ecole (ecole_nom) values ('University of Oxford Said');
		insert into candidature_ecole (ecole_nom) values ('Dartmouth College Tuck');
		insert into candidature_ecole (ecole_nom) values ('University of Michigan Ross');
		insert into candidature_ecole (ecole_nom) values ('UCLA Anderson');
		insert into candidature_ecole (ecole_nom) values ('SDA Bocconi');
		insert into candidature_ecole (ecole_nom) values ('Cornell University Johnson');
		insert into candidature_ecole (ecole_nom) values ('The University of Hong Kong');
		insert into candidature_ecole (ecole_nom) values ('CUHK Business School');
		insert into candidature_ecole (ecole_nom) values ('National University of Singapore Business School');
		insert into candidature_ecole (ecole_nom) values ('University of Virginia Darden');
		insert into candidature_ecole (ecole_nom) values ('Indian School of Business');
		insert into candidature_ecole (ecole_nom) values ('Imperial College Business School');
		insert into candidature_ecole (ecole_nom) values ('Manchester Business School');
		insert into candidature_ecole (ecole_nom) values ('Carnegie Mellon Tepper');
		insert into candidature_ecole (ecole_nom) values ('The Lisbon MBA');
		insert into candidature_ecole (ecole_nom) values ('Warwick Business School');
		insert into candidature_ecole (ecole_nom) values ('University of North Carolina Kenan-Flagler');
		insert into candidature_ecole (ecole_nom) values ('Nanyang Business School');
		insert into candidature_ecole (ecole_nom) values ('University of Texas at Austin McCombs');
		insert into candidature_ecole (ecole_nom) values ('Georgetown University McDonough');
		insert into candidature_ecole (ecole_nom) values ('Rice University Jones');
		insert into candidature_ecole (ecole_nom) values ('University of California at Irvine Merage');
		insert into candidature_ecole (ecole_nom) values ('Rotterdam School of Management');
		insert into candidature_ecole (ecole_nom) values ('City University Cass');
		insert into candidature_ecole (ecole_nom) values ('Cranfield School of Management');
		insert into candidature_ecole (ecole_nom) values ('Purdue University');
		insert into candidature_ecole (ecole_nom) values ('University of Maryland Smith');
		insert into candidature_ecole (ecole_nom) values ('Lancaster University Management School');
		insert into candidature_ecole (ecole_nom) values ('University of Washington Foster');
		insert into candidature_ecole (ecole_nom) values ('University of Cape Town GSB');
		insert into candidature_ecole (ecole_nom) values ('University of Toronto Rotman');
		insert into candidature_ecole (ecole_nom) values ('Michigan State University Broad');
		insert into candidature_ecole (ecole_nom) values ('Shanghai Jiao Tong University Antai');
		insert into candidature_ecole (ecole_nom) values ('Mannheim Business School');
		insert into candidature_ecole (ecole_nom) values ('Fudan University School of Management');
		insert into candidature_ecole (ecole_nom) values ('University of Southern California Marshall');
		insert into candidature_ecole (ecole_nom) values ('Emory University Goizueta');
		insert into candidature_ecole (ecole_nom) values ('Sungkyunkwan University');
		insert into candidature_ecole (ecole_nom) values ('Vanderbilt University Owen');
		insert into candidature_ecole (ecole_nom) values ('Indiana University Kelley');
		insert into candidature_ecole (ecole_nom) values ('European School of Management and Technology');
		insert into candidature_ecole (ecole_nom) values ('University of Iowa Tippie');
		insert into candidature_ecole (ecole_nom) values ('Georgia Institute of Technology');
		insert into candidature_ecole (ecole_nom) values ('San Diego School of Business Administration');
		insert into candidature_ecole (ecole_nom) values ('University of St Gallen');
		insert into candidature_ecole (ecole_nom) values ('Macquarie Graduate School of Management');
		insert into candidature_ecole (ecole_nom) values ('Ohio State University');
		insert into candidature_ecole (ecole_nom) values ('Wisconsin School of Business');
		insert into candidature_ecole (ecole_nom) values ('University of Illinois');
		insert into candidature_ecole (ecole_nom) values ('Washington University');
		insert into candidature_ecole (ecole_nom) values ('University College Dublin Smurfit');
		insert into candidature_ecole (ecole_nom) values ('Babson College Olin');
		insert into candidature_ecole (ecole_nom) values ('AGSM at UNSW Business School');
		insert into candidature_ecole (ecole_nom) values ('SMU Cox');
		insert into candidature_ecole (ecole_nom) values ('Arizona State University');
		insert into candidature_ecole (ecole_nom) values ('Boston University School of Management');
		insert into candidature_ecole (ecole_nom) values ('Durham University Business School');
		insert into candidature_ecole (ecole_nom) values ('University of Strathclyde');
		insert into candidature_ecole (ecole_nom) values ('University of British Columbia');
		insert into candidature_ecole (ecole_nom) values ('University of Minnesota');
		insert into candidature_ecole (ecole_nom) values ('University of Bath');
		insert into candidature_ecole (ecole_nom) values ('University of Rochester');
		insert into candidature_ecole (ecole_nom) values ('Queen''s School of Business');
		insert into candidature_ecole (ecole_nom) values ('University of Alberta');
		insert into candidature_ecole (ecole_nom) values ('Pennsylvania State University Smeal');
		insert into candidature_ecole (ecole_nom) values ('University of Notre Dame');
		insert into candidature_ecole (ecole_nom) values ('Melbourne Business School');
		insert into candidature_ecole (ecole_nom) values ('Boston College');
		insert into candidature_ecole (ecole_nom) values ('George Washington University School of Business');
		insert into candidature_ecole (ecole_nom) values ('University of California, San Diego');
		insert into candidature_ecole (ecole_nom) values ('Vlerick Business School');
		insert into candidature_ecole (ecole_nom) values ('Birmingham Business School');
		insert into candidature_ecole (ecole_nom) values ('University of South Carolina');
		insert into candidature_ecole (ecole_nom) values ('University of Pittsburgh');
		insert into candidature_ecole (ecole_nom) values ('Tias Business School');
		insert into candidature_ecole (ecole_nom) values ('Western University');
		insert into candidature_ecole (ecole_nom) values ('McGill University')");
	return $select->execute();
}
function selectCoursByUserToMotor($id_user)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select cours.intitule from users join users_has_cours on users.id_user=users_has_cours.id_user join cours on cours.id_cours=users_has_cours.id_cours where id_user=:id_user');
	$select->execute();
	$select->bindParam(":id_user",$id_user);
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	//var_dump($result);
	return $result;
}

function selectAll()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select * from users');
	$select->execute();
	$result=$select->fetchAll();
	return $result;
}

function connexionUser($mp,$email)
{
	$mp=sha1($mp);
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare("select id_user, email, nom from users where email=:email and password=:password");
	$select->bindValue(":password",$mp);
	$select->bindParam(":email",$email);
	$select->execute();
	$result= $select->fetch(PDO::FETCH_ASSOC);
	return $result;
}
function connexionUserFacebook($mp,$email)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if($mp=" ")
	{
		$select=$connexion->prepare("select id_user, email, nom from users where email=:email");
		$select->bindParam(":email",$email);
		$select->execute();
		$result= $select->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		$select=$connexion->prepare("select id_user, email, nom from users where email=:email and password=:password");
		$select->bindValue(":password",$mp);
		$select->bindParam(":email",$email);
		$select->execute();
		$result= $select->fetch(PDO::FETCH_ASSOC);
	}
	return $result;
}
function connexionEmp($mp,$email)
{
	$mp=sha1($mp);
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare("select id_employe, email, nom from employe where email=:email and password=:password and actif=1");
	$select->bindValue(":password",$mp);
	$select->bindParam(":email",$email);
	$select->execute();
	$result= $select->fetch(PDO::FETCH_ASSOC);
	//echo "hello2";
	//var_dump($result);
	return $result;
}
function connexionEmpFacebook($mp,$email)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	if($mp=" ")
	{
		$select=$connexion->prepare("select id_employe, email, nom from employe where email=:email and actif=1");
		$select->bindParam(":email",$email);
		$select->execute();
		$result= $select->fetch(PDO::FETCH_ASSOC);
	}
	else
	{
		$select=$connexion->prepare("select id_employe, email, nom from employe where email=:email and password=:password and actif=1");
		$select->bindValue(":password",$mp);
		$select->bindParam(":email",$email);
		$select->execute();
		$result= $select->fetch(PDO::FETCH_ASSOC);
	}
	
	//echo "hello2";
	//var_dump($result);
	return $result;
}

function emailDispo($email) //v�rifie si l'email est disponible
{    
      $db=connection::getInstance();
	  $connexion=$db->dbh;
	  $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      $requete_prepare_1=$connexion->prepare("SELECT * FROM users where email = :email");
      $requete_prepare_1->bindParam(':email',$email);
      $requete_prepare_1->execute();
      $lignes=$requete_prepare_1->fetch(PDO::FETCH_ASSOC);
      return $lignes;
}

function coursParEcole()
{
		$db=connection::getInstance();
	    $connexion=$db->dbh;
	    $connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	    $requete_prepare_1=$connexion->prepare("SELECT * FROM coursparecole");
	    $requete_prepare_1->execute();
	    $lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);
	    return $lignes;
}


function utilisateurParType()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$requete_prepare_1=$connexion->prepare("SELECT * FROM userspartypeimportant");
	$requete_prepare_1->execute();
	$lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);
	return $lignes;
}
function listeCoursByUser()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare("SELECT cours.date_cours,cours.intitule,users.gsm,users.nom,users.email,users.id_user FROM cours join users_has_cours on users_has_cours.id_cours=cours.id_cours join users on users_has_cours.id_user=users.id_user group by users.id_user");
	$select->execute();
	$lignes=$select->fetchAll(PDO::FETCH_ASSOC);
	return $lignes;
}

function utilisateurParTypeParam($type)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$requete_prepare_1=$connexion->prepare("SELECT * FROM userspartypeimportant where type=:type");
	$requete_prepare_1->bindParam(':type', $type);
	$requete_prepare_1->execute();
	$lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);
	return $lignes;
}

function modifNouveauMotPasseAleatoire($mp,$email)  // g�n�re un nouveau mot de passe al�atoire pour l'utilisateur qui lui sera envoy� par mail
{
	$pwd=$this->generatePassword();
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$update=$connexion->prepare("UPDATE `users` SET `password`=:mp where `email`=:email and password=:password");
 	$update->bindValue(":mp",$pwd);
	$update->bindValue(":password",$mp);
	$update->bindValue(":email",$email);
	$update->execute();
	return $update;
}
function modifNouveauMotPasse($mp1,$mp2,$email)  // g�n�re un nouveau mot de passe choisi par l'utilisateur
{
	$mp1=sha1($mp1);
	$mp2=sha1($mp2);
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$update=$connexion->prepare("UPDATE `users` SET `password`=:mp where `email`=:email and password=:password");
 	$update->bindValue(":mp",$mp2);
	$update->bindValue(":password",$mp1);
	$update->bindValue(":email",$email);
	$update->execute();
	return $update;
}
function updateDataUser($nom,$location,$bio,$id_user)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('UPDATE `users` SET  nom=:nom,biographie=:bio,location=:location where id_user=:id');
	$select->bindParam(':nom',$nom);
	$select->bindParam(':bio',$bio);
	$select->bindParam(':location',$location);
	$select->bindParam(':id',$id_user);
	$success = $select->execute();
	return $success;	
}
function updateDataUserFromEmp($comments,$id_user)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('UPDATE `users` SET  comments=:comments where id_user=:id');
	$select->bindParam(':comments',$comments);
	$select->bindParam(':id',$id_user);
	$success = $select->execute();
	return $success;	
}
function getPlannedTestById($id)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select * from user_has_planed_test where id_user=:id');
	$select->bindParam(':id',$id);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	return $result;	
}
function getPlannedProgramById($id)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select * from user_has_candidature_program where id_user=:id');
	$select->bindParam(':id',$id);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	return $result;	
}
function getDataUserById($id)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select * from users where id_user=:id');
	$select->bindParam(':id',$id);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	return $result;	
}
/*nom, biographie, location, prenom, adress,gsm, date_naiss, service_militaire*/
function getDataUserByIdFromEmp($id)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select * from users where id_user=:id');
	$select->bindParam(':id',$id);
	$select->execute();
	$result=$select->fetchAll(PDO::FETCH_ASSOC);
	return $result;	
}

function utilisateurParcours($id_cours)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$requete_prepare_1=$connexion->prepare("SELECT * FROM usersparcours where id_cours=:id_cours");
	$requete_prepare_1->bindParam(':id_cours',$id_cours);
	$requete_prepare_1->execute();
	$lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);	
	return $lignes;
}

 function nbJours($debut, $fin) {
	//60 secondes X 60 minutes X 24 heures dans une journ�e
	$nbSecondes= 60*60*24;
	$debut_ts = strtotime($debut);
	$fin_ts = strtotime($fin);
	$diff = $fin_ts - $debut_ts;
	return round($diff / $nbSecondes);
}
function updateUserFormPersonalInfo(User $user)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('UPDATE `users` SET `nom`=:nom,`prenom`=:prenom,`adress`=:adress,`gsm`=:gsm,`location`=:location,`gender`=:gender,`date_naiss`=:date_naiss,`service_militaire`=:service_mil WHERE id_user=:id_user');
	$select->bindParam(':nom',$user->getNom());
	$select->bindParam(':prenom',$user->getPrenom());
	$select->bindParam(':adress',$user->getAdress());
	$select->bindParam(':gsm',$user->getGsm());
	$select->bindParam(':location',$user->getLocation());
	$select->bindParam(':gender',$user->getGenre());
	$select->bindParam(':date_naiss',$user->getBirth_date());
	$select->bindParam(':service_mil',$user->getMilitary_status());
	$select->bindParam(':id_user',$user->getId_user());
	$success = $select->execute();
	return $success;
}
function  updateUserFormWorkHistory($ann_deb,$ann_fin,$current_job,$id_user)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('UPDATE `users` SET `annee_experience_deb`=:annee_deb,`annee_experience_fin`=:annee_fin,`current_job`=:current_job WHERE id_user=:id_user');
	$select->bindParam(':annee_deb',$ann_deb);
	$select->bindParam(':annee_fin',$ann_fin);
	$select->bindParam(':current_job',$current_job);
	$select->bindParam(':id_user',$id_user);
	$success = $select->execute();
	return $success;
}
function afficheScore($id_user)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$requete_prepare_1=$connexion->prepare("SELECT * FROM user_has_score where id_user=:id_user order by id_test asc");
	$requete_prepare_1->bindParam(':id_user',$id_user);
	$requete_prepare_1->execute();
	$lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);	
	return $lignes;
}
function updateUserFormEducation(array $tab_education, array $tab_planed_test)
{	
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	/** update user **/
	
	$select=$connexion->prepare('UPDATE `users` SET `plus_haut_diplome`=:plus_haut_diplome,`niveau_etude`=:niveau_etude,`admission_consulting`=:admission_consulting WHERE id_user=:id_user');
	$select->bindParam(':plus_haut_diplome',$tab_education['high_grade']);
	$select->bindParam(':niveau_etude',$tab_education['area_study']);
	$select->bindParam(':admission_consulting',$tab_education['admission_consulting']);
	$select->bindParam(':id_user',$tab_education['id_user']);
	$success = $select->execute();
	
	/** update planed **/
	
	if($tab_planed_test['gmat']!="")
	{
		$select=$connexion->prepare('UPDATE `user_has_planed_test` SET `taken`=:taken where id_user=:id_user and id_test=:id_test');
		$select->bindParam(':id_test',$tab_planed_test['gmat']);
		$select->bindParam(':id_user',$tab_education['id_user']);
		$select->bindValue(':taken',1);
		$plan1 = $select->execute();
	}
	
	if($tab_planed_test['gre']!="")
	{
		$select=$connexion->prepare('UPDATE `user_has_planed_test` SET `taken`=:taken where id_user=:id_user and id_test=:id_test');
		$select->bindParam(':id_test',$tab_planed_test['gre']);
		$select->bindParam(':id_user',$tab_education['id_user']);
		$select->bindValue(':taken',1);
		$plan2 = $select->execute();
	}
	
	if($tab_planed_test['toefl']!="")
	{
		$select=$connexion->prepare('UPDATE `user_has_planed_test` SET `taken`=:taken where id_user=:id_user and id_test=:id_test');
		$select->bindValue(':id_test',$tab_planed_test['toefl']);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':taken',1);
		$plan3 = $select->execute(); 
	}
	
	if($tab_planed_test['lsat']!="")
	{
		$select=$connexion->prepare('UPDATE `user_has_planed_test` SET `taken`=:taken where id_user=:id_user and id_test=:id_test');
		$select->bindValue(':id_test',$tab_planed_test['lsat']);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':taken',1);
		$plan4 = $select->execute(); 
	}
	
	if($tab_planed_test['mcat']!="")
	{
		$select=$connexion->prepare('UPDATE `user_has_planed_test` SET `taken`=:taken where id_user=:id_user and id_test=:id_test');
		$select->bindValue(':id_test',$tab_planed_test['mcat']);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':taken',1);
		$plan5 = $select->execute();	 
	}
	
	/** update test done **/
	
	if($tab_education['gmat_score']!="")
	{
		$select=$connexion->prepare('UPDATE user_has_score SET score=:score where id_test=:id_test and id_user=:id_user');
		$select->bindValue(':id_test',1);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':score',$tab_education['gmat_score']);
		$score1 = $select->execute();
	}
	
	if($tab_education['gre_score']!="")
	{
		$select=$connexion->prepare('UPDATE user_has_score SET score=:score where id_test=:id_test and id_user=:id_user');
		$select->bindValue(':id_test',2);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':score',$tab_education['gre_score']);
		$score2 = $select->execute();
	}
	
	if($tab_education['toefl_score']!="")
	{
		$select=$connexion->prepare('UPDATE user_has_score SET score=:score where id_test=:id_test and id_user=:id_user');
		$select->bindValue(':id_test',3);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':score',$tab_education['toefl_score']);
		$score3 = $select->execute();
	}
	
	if($tab_education['lsat_score']!="")
	{
		$select=$connexion->prepare('UPDATE user_has_score SET score=:score where id_test=:id_test and id_user=:id_user');
		$select->bindValue(':id_test',4);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':score',$tab_education['lsat_score']);
		$score4 = $select->execute();
	}
	
	if($tab_education['mcat_score']!="")
	{
		$select=$connexion->prepare('UPDATE user_has_score SET score=:score where id_test=:id_test and id_user=:id_user');
		$select->bindValue(':id_test',5);
		$select->bindValue(':id_user',$tab_education['id_user']);
		$select->bindValue(':score',$tab_education['mcat_score']);
		$score5 = $select->execute();
	}
	return $success;
}
function updateFormSchoolOrientation(array $tab_apply_prog, array $tab_apply_school,$work_industry,$id_user)
{
	/*
	for($j=0;$j<count($tab_apply_school);$j++)
	{
		echo $tab_apply_school[$j];
	}*/
	$db=connection::getInstance();
    $connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	
	/****  apply school  ***/
	for($i=0;$i<count($tab_apply_school);$i++)
	{
		$j=$i+1;
		$insert = $connexion->prepare('UPDATE `user_has_cand_ecole` SET `id_ecole`=:id_ecole WHERE id_user=:id_user and no_ligne=:no_ligne');
		$insert->bindValue(':id_user',$id_user);
		$insert->bindValue(':no_ligne',$i+1);
		$insert->bindValue(':id_ecole',$tab_apply_school[$i]);
		$success = $insert->execute();			
	}
	
	for($i=1;$i<=4;$i++)
	{
		$select=$connexion->prepare('UPDATE `user_has_candidature_program` SET `taken`=:taken WHERE id_user=:id_user and id_program=:id_program');
		$select->bindValue(':id_user',$id_user);
		$select->bindValue(':id_program',$i);
		if($tab_apply_prog[$i]!="")
		{
			$select->bindValue(':taken',1);
		}
		else
		{
			$select->bindValue(':taken',0);
		}
		$score = $select->execute();
	}
	
	$select=$connexion->prepare('UPDATE `users` SET `college_industry`=:college_industry WHERE id_user=:id_user');
	$select->bindParam(':college_industry',$work_industry);
	$select->bindParam(':id_user',$id_user);
	$success = $select->execute();
	return $success;
}
function getPlannedSchoolById($id)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$requete_prepare_1=$connexion->prepare("SELECT * FROM user_has_cand_ecole where id_user=:id_user");
	$requete_prepare_1->bindParam(':id_user',$id);
	$requete_prepare_1->execute();
	$lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);	
	return $lignes;
}
function selectApplyiedSchool()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$requete_prepare_1=$connexion->prepare("SELECT * FROM candidature_ecole");
	$requete_prepare_1->bindParam(':id_user',$id_user);
	$requete_prepare_1->execute();
	$lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);	
	return $lignes;
}
function afficheApplyedSchool($id_user)
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$requete_prepare_1=$connexion->prepare("SELECT * FROM candidature_ecole join user_has_cand_ecole on candidature_ecole.id_ecole=user_has_cand_ecole.id_ecole where id_user=:id_user");
	$requete_prepare_1->bindParam(':id_user',$id_user);
	$requete_prepare_1->execute();
	$lignes=$requete_prepare_1->fetchAll(PDO::FETCH_ASSOC);	
	return $lignes;
}
}

?>