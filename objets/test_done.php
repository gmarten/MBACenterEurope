<?php

class TestDone{
private $_id_test_done;
private $_intitule_test_done;


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
public function getId_test_done()
{
	return $this->_id_test_done;
}
public function getIntitule_test_done()
{
	return $this->_intitule_test_done;
}
//setters

public function setId_test_done($id_test_done)
{
	$this->_id_test_done=$id_test_done;
}
public function setIntitule_test_done($intitule_test_done)
{
	$this->_intitule_test_done=$intitule_test_done;
}
}

?>

