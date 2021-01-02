<?php
Class Membre{

	public $id;
	public $pseudo;
	public $email;
	public $mdp;
	public $isbanned;
	public $isadmin;

	function __construct($id, $pseudo, $email, $mdp, $isbanned, $isadmin){
		$this->id = $id;
		$this->pseudo = $pseudo;
		$this->email = $email;
		$this->mdp = $mdp;
		$this->isbanned = $isbanned;
		$this->isadmin = $isadmin;
	}

	function getmdp(){
		return $this->mdp;
	}
}

?>