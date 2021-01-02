<?php
Class Sujet{
	public $id;
	public $nom;
	public $date;
	public $auteur;

 	public function __construct($id, $nom, $date, $auteur){
		$this->id = $id;
		$this->nom = $nom;
		$this->date = $date;
		$this->auteur = $auteur;
 	}
}

?>