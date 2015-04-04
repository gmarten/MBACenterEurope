<?php
require_once('../managers/coursManager.php');
require_once('../objets/cours.php');

$coursManager = new CoursManager();
$cours = new Cours(array(
	'intitule'=>'Math',
	'id_ecole'=>1,
	'date'=>"2015-10-10"
	));
$coursManager->add($cours);

?>