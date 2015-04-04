<?php
class Connection
{	
	var $dsn = 'mysql:dbname=mbacentemdacount;host=mbacentemdacount.mysql.db';
	var $user = 'mbacentemdacount';
	var $password = 'Clement2015';
	
	/*
	var $dsn = 'mysql:dbname=mbacen;host=127.0.0.7';
	var $user = 'root';
	var $password = '';
	var $dbh;
	*/
	
	private static $instance=null;
	private function __construct()
	{   
		try {
  		$this->dbh = new PDO($this->dsn, $this->user, $this->password);

			} 	catch (PDOException $e) {
  				echo 'Echec de la connexion : ' . $e->getMessage();
			}
	}
	 public static function getInstance() 
	 {
		if(is_null(self::$instance)) 
		{
			self::$instance = new Connection();
		}
		return self::$instance;
	}
}

?>

