<?php

class Employe{

private $_id_employe;
private $_id_employe_sha;
private $_password;
private $_nom;
private $_prenom;
private $_gsm;
private $_email;
private $_actif;

private $_date_naiss;
private $_adress;
private $_genre;
private $_military_status;


public function __construct(array $donnees)
{
	$this->hydrate($donnees);
}
public function hydrate(array $donnees)
{
	foreach ($donnees as $key => $value)
	{
		// On récupère le nom du setter correspondant à l'attribut.
		$method = 'set'.ucfirst($key);
		 
		// Si le setter correspondant existe.
		if (method_exists($this, $method))
		{
		// On re?cupe?re le nom du setter correspondant a? l'attribut.
			$this->$method($value);
		}
	}
}
//getters

public function getId_employe()
{
	return $this->_id_employe;
}
public function getPassword()
{
	return $this->_password;
}
public function getActif()
{
	return $this->_actif;
}
public function getNom()
{
	return utf8_decode($this->_nom);
}
public function getPrenom()
{
	return utf8_decode($this->_prenom);
}
public function getGsm()
{
	return $this->_gsm;
}
public function getEmail()
{
	return utf8_decode($this->_email);
}
public function getId_employe_sha()
{
	return utf8_decode($this->_id_employe_sha);
}
public function getAdress()
{
	return utf8_decode($this->_adress);
}

public function getGenre()
{
	return $this->_genre;
}
public function getDate_naiss()
{
	return $this->_date_naiss;
}
public function getMilitary_status()
{
	return $this->_military_status;
}

//setters

public function setMilitary_status($military_stat)
{
	$this->_military_status=$military_stat;
}
public function setAdress($adress)
{
	$this->_adress = $adress;
}
public function setGenre($genre)
{
	$this->_genre = $genre;
}
public function setDate_naiss($date_naiss)
{
	$this->_date_naiss = $date_naiss;
}

public function setId_employe($id_employe)
{
	$this->_id_user=$id_employe;
}
public function setNom($nom)
{
	$this->_nom=utf8_encode($nom);
}
public function setPrenom($prenom)
{
	$this->_prenom=utf8_encode($prenom);
}
public function setGsm($gsm)
{
	$this->_gsm=utf8_encode($gsm);
}	
public function setId_employe_sha($id_sha)
{
	$this->_id_employe_sha=$id_sha;
}
public function setPassword($password)
{
	$this->_password=utf8_encode(sha1($password));
}
public function setEmail($email)
{
	$this->_email=utf8_encode($email);
}
public function setActif($actif)
{
	$this->_actif=$actif;
}
}

?>

