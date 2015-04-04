<?php
require_once('../managers/ecoleManager.php');
require_once('../objets/ecole.php');

$ecoleManager = new EcoleManager();
$ecole = new Ecole(array(
	'nom'=>'Ulb',
	'rue'=>'rue du campus',
	'commune'=>'ixelles',
	'ville'=>'Bruxelles',
	'pays'=>'Belgique',
	'tel'=>'0987675545',
	'numero'=>'3',
	'email'=>'ecole@mail.com'));

?>