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
		$model = new Simplemodel();
		$model->repondre($pseudo, $nom, $desc);
		$dVue = array (
			'article' => "",
			'rep' => "",
			);
		$dVue['article'] = $model->getNomSujet($topic);
		$dVue['rep'] = $model->afficheSujet($topic);
		require_once($rep.$vues['vueSujet']);
	}

}