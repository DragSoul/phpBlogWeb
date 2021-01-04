<?php

Class ArticleGateway{

	private $con;

	function __construct(){
		global $dsn, $user, $mdp;
		$this->con = new Connection($dsn, $user, $mdp);
	}

	function SelectAll() : array{
		$tab = array();
		$query = 'SELECT * FROM articles';
		$this->con->executeQuery($query, array());
		$results=$this->con->getResults();
		Foreach ($results as $row){
					$id = $row['id'];
					$nom = $row['nom'];
					$date = $row['date'];
					$auteur = $row['auteur'];
                    $t = new Article($id, $nom, $date, $auteur);
                    $tab[] = $t;
        }
        return $tab;
	}

	function ajout($nom, $auteur){
		$query = "INSERT INTO articles(nom, auteur) VALUES(:nom, :auteur)";
		$this->con->executequery($query, array(
				':nom' => array($nom, PDO::PARAM_STR),
				':auteur' => array($auteur, PDO::PARAM_STR)));
	}

	function getId($nom, $id){
		$query = 'SELECT id FROM articles WHERE nom=:nom AND auteur=:auteur';
		$this->con->executequery($query, array(
			':nom' => array($nom, PDO::PARAM_STR),
			':auteur' => array($id, PDO::PARAM_STR)));
		return $this->con->getResults()[0];
	}

	function getNom($id){
		$query = 'SELECT nom FROM articles WHERE id=:id';
		$this->con->executequery($query, array(
			':id' => array($id, PDO::PARAM_STR)));
		return $this->con->getResults()[0];
	}

	function supprArticle($idSujet){
		$query = "DELETE FROM articles WHERE id=:idsujet";
		$this->con->executequery($query, array(
				':idsujet' => array($idSujet, PDO::PARAM_STR)));
	}
}

?>