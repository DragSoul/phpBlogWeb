<?php

class Simplemodel{

	function connexion($login, $password)
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


	// à travailler : vérifier quand saisi carac interdit et permettre à l'user d'etre co direct et pas
	//retaper ses id
	function inscription($email, $login, $password){
		$MembreGateway = new MembreGateway();
		$login = Validation::sanitizeString($login);
		$password = Validation::sanitizeString($password);
		$password = password_hash($password, 1);
		$userCo = $MembreGateway->newMembre($email, $login, $password);

	}

	function afficheForum() : array{ //retourne les tâches dans un tableau
		$articleGateway = new ArticleGateway();
		$tab = $articleGateway->SelectAll();
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

	function ajouterArticle($pseudo, $nom, $contenu){
		$articleGateway = new ArticleGateway();
		$membreGateway = new MembreGateway();
		Validation::sanitizeString($nom);
		Validation::sanitizeString($contenu);
		$id = $membreGateway->getId($pseudo);
		$articleGateway->ajout($nom, $id['id'], $contenu);
	}

	function afficheCommentaire($topic){
		$commGateway = new CommentaireGateway();
		$membreGateway = new MembreGateway();
		$tab = $commGateway->SelectAll($topic);
		$tab2 = [];
		foreach($tab as $t){
			$proprietaire = $membreGateway->getPseudo($t->auteur);
			$post = [$proprietaire, $t->contenu, $t->date];
			$tab2[] = $post;
		}
		return $tab2;
	}

	function repondre($pseudo, $nom, $desc){
		$commGateway = new CommentaireGateway();
		$membreGateway = new MembreGateway();
		Validation::sanitizeString($desc);
		$id = $membreGateway->getId($pseudo);
		$commGateway->ajout($id['id'], $desc, $nom);
	}

	function getArticle($id){
		$articleGateway = new ArticleGateway();
		return $articleGateway->getArticle($id);
	}

	function supprArticle($idArticle){
		$articleGateway = new ArticleGateway();
		$commGateway = new CommentaireGateway();
		$commGateway->supprAllComm($idArticle);
		$articleGateway->supprArticle($idArticle);
	}

	function getNomAuteur($id){
		$membreGateway = new MembreGateway();
		return $membreGateway->getPseudo($id);
	}
}
?> 