<?php
spl_autoload_register();
require_once("connexionSingleton.php");
require_once("../objets/ecole.php");
class EcoleManager{
function hello()
{
	echo "hello";
}

function add(Ecole $ecole)
{
	$db=connection::getInstance();
    $connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $insert = $connexion->prepare('INSERT INTO ecole(
									nom,rue,commune,ville,pays,tel,numero,email) 
									VALUES(:nom,:rue,:commune,:ville,:pays,:tel,:numero,:email)');
	
	$success = $insert->execute(array(
	    ':nom'=>$ecole->getNom(),
	    ':rue'=>$ecole->getRue(),
		':commune'=>$ecole->getCommune(),
		':ville'=>$ecole->getVille(),
		':pays'=>$ecole->getPays(),
		':tel'=>$ecole->getTel(),
		':numero'=>$ecole->getNumero(),
		':email'=>$ecole->getEmail()
	));
	return $success;
}

function selectAll()
{
	$db=connection::getInstance();
	$connexion=$db->dbh;
	$connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$select=$connexion->prepare('select * from ecole');
	$select->execute();
	$result=$select->fetchAll();
	return $result;
}

}

?>