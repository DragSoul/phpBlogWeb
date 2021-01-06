<?php
Class Article{
	public $id;
	public $nom;
	public $date;
	public $auteur;
	public $contenu;

 	public function __construct($id, $nom, $date, $auteur, $contenu){
		$this->id = $id;
		$this->nom = $nom;
		$this->date = $date;
		$this->auteur = $auteur;
		$this->contenu = $contenu;
 	}
}

?>