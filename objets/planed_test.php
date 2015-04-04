<?php

class PlanedTest{
private $_id_planed_test;
private $_intitule_test;

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

public function getId_planed_test()
{
	return $this->_id_user;
}
public function getIntitule_test()
{
	return utf8_decode($this->_intitule_test);
}
//setters

public function setId_user($id_planed_test)
{
	$this->_id_planed_test=$id_planed_test;
}
public function setNom($intitule_test)
{
	$this->_intitule_test=utf8_encode($intitule_test);
}
}

?>

