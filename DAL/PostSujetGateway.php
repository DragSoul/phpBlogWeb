<?php

Class PostSujetGateway{

	private $con;

	function __construct(){
		global $dsn, $user, $mdp;
		$this->con = new Connection($dsn, $user, $mdp);
	}

	function SelectAll($topic) : array{
		$tab = array();
		$querry = 'SELECT * FROM commentaires WHERE idarticle=:topic';
		$this->con->executeQuery($querry, array(':topic' => array($topic, PDO::PARAM_STR)));
		$results=$this->con->getResults();
		Foreach ($results as $row){
			$id = $row['id'];
			$auteur = $row['auteur'];
			$contenu = $row['contenu'];
            $date = $row['date'];
            $idarticle = $row['idarticle'];
            $t = new PostSujet($id, $auteur, $contenu, $date, $idarticle);
            $tab[] = $t;
        }
        return $tab;
	}

	function ajout($auteur, $contenu, $idarticle){
		$query = "INSERT INTO commentaires(auteur,contenu,idarticle) VALUES(:auteur, :contenu, :idarticle)";
		$this->con->executequery($query, array(
				':auteur' => array($auteur, PDO::PARAM_STR),
				':contenu' => array($contenu, PDO::PARAM_STR), 
				':idarticle' => array($idarticle, PDO::PARAM_STR)));
	}
}

?>