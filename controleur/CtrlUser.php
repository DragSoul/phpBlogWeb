<?php

class CtrlUser {

	function __construct($action) {
		global $rep,$vues;
		
		$dVueEreur = array ();
		try{
			switch($action) {

				case NULL:
					$this->afficheForum();
					break;

				case "affiche" :
					$this->afficheForum();
					break;
				case "connexion" : //redirection sur la page de connexion
					$this->ReinitCo();
					break;

				case "validationFormulaireCo" :
					$this->connexion($dVueEreur);
					break;

				case "validationFormulaireIn" :
					$this->inscription($dVueEreur);
					break;

				case "inscription" ://redirection sur la page d'inscription
					$this->ReinitIn();
					break;

				case "afficheSujet":
					$this->afficheSujet($_REQUEST['topic']);
					break;

				default:
					$dVueEreur[] = "Erreur dans le switch de la vueP (User)";
					require ($rep.$vues['erreur']);
					break;
			}
		} 
		catch (PDOException $e)
		{
			$dVueEreur[] =	$e;
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

	function ReinitCo() {
		global $rep,$vues;
		$dVue = array (
				'login' => "",
				'password' => "",
				);
		require_once($rep.$vues['vueConnexion']);
	}

	function ReinitIn() {
		global $rep,$vues;
		$dVue = array (
				'email' => "",
				'login' => "",
				'password' => "",
				);
		require_once($rep.$vues['vueInscription']);
	}

	function connexion(array $dVueEreur) {
		global $rep,$vues;
		$login=$_POST['txtLogin'];
		$password=$_POST['txtPassword'];
		Validation::val_formCo($login,$password,$dVueEreur);

		$model = new Simplemodel();
		$data=$model->connexion($login, $password);
		if ($data != null) {
			$this->afficheForum();
		}
		else{
			$this->ReinitCo();
		}
	}

	function inscription(array $dVueEreur){
		global $rep,$vues;
		$email = $_POST['txtEmail'];
		$login=$_POST['txtLogin'];
		$password=$_POST['txtPassword'];
		Validation::val_formIn($email,$login,$password,$dVueEreur);

		$model = new Simplemodel();
		$data = $model->inscription($email, $login, $password);
		$this->ReinitCo();

	}

	function afficheSujet($topic){
		global $rep,$vues;
		$m = new Simplemodel();
		$dVue = array (
			'article' => "",
			'rep' => "",
			);
		$dVue['article'] = $m->getNomSujet($topic);
		$dVue['rep'] = $m->afficheSujet($topic);		
		require_once($rep.$vues['vueSujet']);
	}
}

?>
