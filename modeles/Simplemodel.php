<?php

class Simplemodel{

	function connexion($login, $password) : Membre
	{
		$MembreGateway = new MembreGateway();
		$login = Validation::sanitizeString($login);
		$password = Validation::sanitizeString($password);
		$userCo = $MembreGateway->loginValide($login);
		if($userCo != null && password_verify($password, $userCo->getmdp())){
			if($userCo->isadmin == 1){
				$_SESSION['role'] = "admin";
			}
			elseif($userCo->isbanned == 1){
				$_SESSION['role'] = "banned";
			}
			else{
				$_SESSION['role'] = "membre";
			}
			$_SESSION['login'] = $userCo->pseudo;
			return $userCo;
		}
		else{
			return null;
		}
	}

	function inscription($email, $login, $password){
		$MembreGateway = new MembreGateway();
		$login = Validation::sanitizeString($login);
		$password = Validation::sanitizeString($password);
		$password = password_hash($password, 1);
		$userCo = $MembreGateway->newMembre($email, $login, $password);

	}

	function afficheForum() : array{ //retourne les tâches dans un tableau
		$postSG = new SujetGateway();
		$tab = $postSG->SelectAll();
		return $tab;
	}
	

	static function IsMembre(){

		if(isset($_SESSION['login']) && isset($_SESSION['role'])){
			$login = Validation::sanitizeString($_SESSION['login']);
			$role = Validation::sanitizeString($_SESSION['role']);
			return new Membre(null, $_SESSION['login'], null, null, null, null);
		}
		else{
			return null;
		}
	}

	function ajouterSujet($pseudo, $nom, $contenu){
		$sujetGateway = new SujetGateway();
		$postSujetGateway = new PostSujetGateway();
		$membreGateway = new MembreGateway();
		Validation::sanitizeString($nom);
		Validation::sanitizeString($contenu);
		$id = $membreGateway->getId($pseudo);
		$sujetGateway->ajout($nom, $id['id']);
		$idSujet = $sujetGateway->getId($nom, $id['id']);
		$postSujetGateway->ajout($id['id'], $contenu, $idSujet['id']);
	}

	function afficheSujet($topic){
		$postSG = new PostSujetGateway();
		$membreG = new MembreGateway();
		$tab = $postSG->SelectAll($topic);
		$tab2 = [];
		foreach($tab as $t){
			$proprietaire = $membreG->getPseudo($t->auteur);
			$post = [$proprietaire[0], $t->contenu];
			$tab2[] = $post;
		}
		return $tab2;
	}

	function repondre($pseudo, $nom, $desc){
		$postSG = new PostSujetGateway();
		$membreGateway = new MembreGateway();
		Validation::sanitizeString($desc);
		$id = $membreGateway->getId($pseudo);
		$postSG->ajout($id['id'], $desc, $nom);
	}

	function getNomSujet($id){
		$SG = new SujetGateway();
		return $SG->getNom($id);
	}
}
?> 