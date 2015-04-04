<?php
class Ecole{

private $_id_ecole;
private $_nom;
private $_tel;
private $_rue;
private $_numero;
private $_email;
private $_ville;
private $_commune;
private $_pays;


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

public function getId_ecole()
{
	return $this->_id_ecole;
}
public function getNom()
{
	return utf8_decode($this->_nom);
}
public function getRue()
{
	return $this->_rue;
}
public function getEmail()
{
	return $this->_email;
}	
public function getNumero()
{
	return $this->_numero;
}
public function getCommune()
{
	return $this->_commune;
}
public function getVille()
{
	return utf8_decode($this->_ville);
}
public function getPays()
{
	return utf8_decode($this->_pays);
}
public function getTel()
{
	return utf8_decode($this->_tel);
}
//setters

public function setId_ecole($id_ecole)
{
	$this->_id_ecole=$id_ecole;
}
public function setNom($nom)
{
	$this->_nom=utf8_encode($nom);
}
public function setTel($tel)
{
	$this->_tel=$tel;
}
public function setCommune($commune)
{
	$this->_commune=$commune;
}
public function setRue($rue)
{
	$this->_rue=utf8_encode($rue);
}
public function setEmail($email)
{
	$this->_email=utf8_encode($email);
}
public function setPays($pays)
{
	$this->_pays=utf8_encode($pays);
}
public function setNumero($numero)
{
	$this->_numero = $numero;
}

}

?>