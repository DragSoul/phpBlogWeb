<?php

class CtrlMembre {
	function __construct($action) {
		global $rep,$vues;
		
		$dVueEreur = array ();
		try{
			switch($action) {

				case NULL:
					$this->afficheForum();
					break;

				case "deconnexion" : 
					$this->deconnexion();
					break;

				case "repondre":
					$this->repondre($_REQUEST['topic']);
					break;

				default:
					$dVueEreur[] = "Erreur dans le switch de la vueP (Membre)";
					require	 ($rep.$vues['erreur']);
					break;
			}
		} 
		catch (PDOException $e)
		{
			$dVueEreur[] =	"Erreur inattendue!!! (PDO) ";
			echo $e;
			require ($rep.$vues['erreur']);
		}
		catch (Exception $e2)
		{
			$dVueEreur[] =	"Erreur inattendue!!! (exception normale) ";
			require ($rep.$vues['erreur']);
		}
		exit(0);
	}

	function afficheForum(){
		global $rep,$vues;
		$m = new Simplemodel();
		$dVue = $m->afficheForum();
		require_once($rep.$vues['vueP']);
	}

	function afficheArticle($topic){
		global $rep,$vues;
		$m = new Simplemodel();
		$article = $m->getArticle($topic);
		$t['nom'] = $article->nom;
		$t['auteur'] = $m->getNomAuteur($article->auteur);
		$t['date'] = $article->date;
		$t['contenu'] = $article->contenu;
		$dVue = array (
			'article' => "",
			'rep' => "",
			);
		$dVue['article'] = $t;
		$dVue['rep'] = $m->afficheCommentaire($topic);
		require_once($rep.$vues['vueArticle']);
	}

	function deconnexion(){
		session_unset();
		session_destroy();
		$_Session = array();
		$this->afficheForum();
	}

	function repondre($topic){
		global $rep,$vues;
		$pseudo = $_SESSION['login'];
		$nom = $topic;
		$desc = $_POST['article'];
		$m = new Simplemodel();
		$m->repondre($pseudo, $nom, $desc);
		$this->afficheArticle($topic);
		require_once($rep.$vues['vueArticle']);
	}

	

}