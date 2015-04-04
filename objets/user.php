<?php

class User{
private $_id_user;
private $_password;
private $_nom;
private $_prenom;
private $_gsm;
private $_email;
private $_type;
private $_comment;
private $_location;
private $_bio;

private $_adress;
private $_genre;
private $_birth_date;
private $_subscription_date;
private $_military_status;
private $_plus_haut_diplome;
private $_niveau_etude;
private $_admission_consulting;
private $_annee_experience_deb;
private $_annee_experience_fin;
private $_current_job;

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
public function getPassword()
{
	return $this->_password;
}
public function getComment()
{
	return $this->_comment;
}
public function getId_user()
{
	return $this->_id_user;
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
public function getBio()
{
	return utf8_decode($this->_bio);
}
public function getLocation()
{
	return utf8_decode($this->_location);
}
public function getType()
{
	return $this->_type;
}
public function getAdress()
{
	return utf8_decode($this->_adress);
}
public function getBirth_date()
{
	return $this->_birth_date;
}
public function getAdmission_consulting()
{
	return $this->_admission_consulting;
}
public function getCurrent_job()
{
	return $this->_current_job;
}
public function getGenre()
{
	return $this->_genre;
}
public function getMilitary_status()
{
	return $this->_military_status;
}
public function getAnnee_experience_fin()
{
	return $this->_annee_experience_fin;
}
public function getAnnee_experience_deb()
{
	return $this->_annee_experience_deb;
}

//setters

public function setBio($bio)
{
	$this->_bio=$bio;
}
public function setId_user($id_user)
{
	$this->_id_user=$id_user;
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

public function setType($type)
{
	$this->_type=utf8_encode($type);
}

public function setPassword($password)
{
	$this->_password=utf8_encode(sha1($password));
}
public function setEmail($email)
{
	$this->_email=utf8_encode($email);
}
public function setLocation($location)
{
	$this->_location=utf8_encode($location);
}
public function setComment($comment)
{
	$this->_comment = $comment;
}
public function setAnnee_experience_deb($annee_deb)
{
	$this->_annee_experience_deb = $annee_deb;
}
public function setAnnee_experience_fin($annee_fin)
{
	$this->_annee_experience_fin = $annee_fin;
}
public function setAdress($adress)
{
	$this->_adress = utf8_encode($adress);
}
public function setGenre($genre)
{
	$this->_genre = $genre;
}
public function setBirth_date($birth_date)
{
	$this->_birth_date = $birth_date;
}
public function setSubscription_date($sub_date)
{
	$this->_subscription_date = $subscription_date;
}
public function setMilitary_status($service_mil)
{
	$this->_military_status = $service_mil;
}
public function setPlus_haut_diplome($dipl)
{
	$this->_plus_haut_diplome = $dipl;
}
public function setAdmission_consulting($admission)
{
	$this->_admission_consulting = $admission;
}

}

?>

