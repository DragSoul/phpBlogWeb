<?php

Class SujetGateway{

	private $con;

	function __construct(){
		global $dsn, $user, $mdp;
		$this->con = new Connection($dsn, $user, $mdp);
	}

	function SelectAll() : array{
		$tab = array();
		$querry = 'SELECT * FROM sujet';
		$this->con->executeQuery($querry, array());
		$results=$this->con->getResults();
		Foreach ($results as $row){
					$id = $row['id'];
					$name = $row['name'];
                    $t = new Sujet($id, $name);
                    $tab[] = $t;
        }
        return $tab;
	}

	function ajout($name){
		$query = "INSERT INTO sujet(name) VALUES(:name)";
		$this->con->executequery($query, array(
				':name' => array($name, PDO::PARAM_STR)));
	}
}

?>