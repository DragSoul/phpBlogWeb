<?php
Class Membre{

	public $pseudo;
	public $email;
	public $mdp;

	function __construct($pseudo, $email, $mdp){
		$this->pseudo = $pseudo;
		$this->email = $email;
		$this->mdp = $mdp;
	}

	function getmdp(){
		return $this->mdp;
	}
}

?>