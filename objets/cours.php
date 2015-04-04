<?php
class Cours{
private $_id_cours;
private $_id_ecole;
private $_intitule;
private $_date;
private $_type_cours;

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

	public function getId_cours()
	{
		return $this->_id_cours;
	}
	public function getType_cours()
	{
		return $this->_type_cours;
	}
	public function getIntitule()
	{
		return $this->_intitule;
	}
	public function getId_ecole()
	{
		return $this->_id_ecole;
	}
	public function getDate()
	{
		return $this->_date;
	}
	//setters
	public function setType_cours($type)
	{
		$this->_type_cours = $type;
	}
	public function setDate($date)
	{
		 $this->_date=$date;
	}
	public function setId_cours($id_cours)
	{
		$this->_id_cours=$id_cours;
	}
	public function setId_ecole($id_ecole)
	{
		$this->_id_ecole = $id_ecole;
	}
	public function setIntitule($intitule)
	{
		$this->_intitule=utf8_encode($intitule);
	}
}

?>

