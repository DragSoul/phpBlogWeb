<?php
Class MembreGateway{

	private $con;

	function __construct(){
		global $dsn, $user, $mdp;
		$this->con = new Connection($dsn, $user, $mdp);
	}

	public function loginValide($login){
		$query = "SELECT * FROM membres WHERE pseudo = :pseudo";
		$this->con->executequery($query, array(':pseudo' => array($login, PDO::PARAM_STR)));
		$result = $this->con->getResults();
		if($result == array()){
			return null;
		}
		else{
			return new Membre($result['0']['id'], $result['0']['pseudo'], $result['0']['email'],
			$result['0']['mdp'], $result['0']['isbanned'], $result['0']['isadmin']);
		}
	}

	public function newMembre($email, $login, $mdp){
		$query = "INSERT INTO membres(pseudo, email, mdp) VALUES(:pseudo, :email, :mdp)";
		$this->con->executequery($query, array(
				':pseudo' => array($login, PDO::PARAM_STR),
				':email' => array($email, PDO::PARAM_STR), 
				':mdp' => array($mdp, PDO::PARAM_STR)));

	}
	
	public function getPseudo($id){
		$query = "SELECT pseudo FROM membres WHERE id=:id";
		$this->con->executequery($query, array(':id' => array($id, PDO::PARAM_STR)));
		return $this->con->getResults()[0];
	}

	public function getId($pseudo){
		$query = 'SELECT id FROM membres WHERE pseudo = :pseudo';
        $this->con->executeQuery($query, array(
            ':pseudo' => array($pseudo, PDO::PARAM_STR),
        ));
		return $this->con->getResults()[0];
	}
}

?>