<?php

Class PostSujetGateway{

	private $con;

	function __construct(){
		global $dsn, $user, $mdp;
		$this->con = new Connection($dsn, $user, $mdp);
	}

	function SelectAll($topic) : array{
		$tab = array();
		$querry = 'SELECT * FROM postsujet WHERE sujet=:topic';
		$this->con->executeQuery($querry, array(':topic' => array($topic, PDO::PARAM_STR)));
		$results=$this->con->getResults();
		Foreach ($results as $row){
			$propri = $row['propri'];
			$contenu = $row['contenu'];
            $date = $row['date'];
            $sujet = $row['sujet'];
            $t = new PostSujet($propri, $contenu, $date, $sujet);
            $tab[] = $t;
        }
        return $tab;
	}

	function ajout($propri, $contenu, $sujet){
		$query = "INSERT INTO postsujet(propri,contenu,sujet) VALUES(:propri, :contenu, :sujet)";
		$this->con->executequery($query, array(
				':propri' => array($propri, PDO::PARAM_STR),
				':contenu' => array($contenu, PDO::PARAM_STR), 
				':sujet' => array($sujet, PDO::PARAM_STR)));
	}
}

?>