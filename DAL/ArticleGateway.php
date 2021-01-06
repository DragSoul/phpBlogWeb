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
					$contenu = $row['contenu'];
                    $t = new Article($id, $nom, $date, $auteur, $contenu);
                    $tab[] = $t;
        }
        return $tab;
	}

	function ajout($nom, $auteur, $contenu){
		$query = "INSERT INTO articles(nom, auteur, contenu) VALUES(:nom, :auteur, :contenu)";
		$this->con->executequery($query, array(
				':nom' => array($nom, PDO::PARAM_STR),
				':auteur' => array($auteur, PDO::PARAM_STR),
				':contenu' => array($contenu, PDO::PARAM_STR)));
	}

	function getId($nom, $id){
		$query = 'SELECT id FROM articles WHERE nom=:nom AND auteur=:auteur';
		$this->con->executequery($query, array(
			':nom' => array($nom, PDO::PARAM_STR),
			':auteur' => array($id, PDO::PARAM_STR)));
		return $this->con->getResults()[0];
	}

	function getArticle($id){
		$query = 'SELECT * FROM articles WHERE id=:id';
		$this->con->executequery($query, array(
			':id' => array($id, PDO::PARAM_STR)));
		$results=$this->con->getResults();
		$id = $results[0]['id'];
		$nom = $results[0]['nom'];
		$date = $results[0]['date'];
		$auteur = $results[0]['auteur'];
		$contenu = $results[0]['contenu'];
		return new Article($id, $nom, $date, $auteur, $contenu);
	}

	function supprArticle($idArticle){
		$query = "DELETE FROM articles WHERE id=:idArticle";
		$this->con->executequery($query, array(
				':idArticle' => array($idArticle, PDO::PARAM_STR)));
	}
}

?>