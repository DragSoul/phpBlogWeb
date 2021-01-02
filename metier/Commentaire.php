<?php
Class Commentaire{

		public $id;
		public $auteur;
 		public $contenu;
		public $date;
		public $idarticle;

 		public function __construct($id, $auteur, $contenu, $date, $idarticle){
			$this->id = $id;
			$this->auteur = $auteur;
 			$this->contenu = $contenu;
			$this->date = $date;
			$this->idarticle = $idarticle;
 		}
}

?>