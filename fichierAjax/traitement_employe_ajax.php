<?php

require_once("../managers/employeManager.php");
require_once("../managers/connexionSingleton.php");
require_once("../objets/employe.php");

$employeManager = new EmployeManager();
$array = $employeManager->connexionEmploye("azerty","clement@hotmail.com");
//print_r($array);

?>