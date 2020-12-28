<?php
Class PostSujet{

		public $propri;
 		public $contenu;
		public $date;
		public $sujet;

 		public function __construct($propri, $contenu, $date, $sujet){
 			$this->propri = $propri;
 			$this->contenu = $contenu;
			$this->date = $date;
			$this->sujet = $sujet;
 		}
}

?>