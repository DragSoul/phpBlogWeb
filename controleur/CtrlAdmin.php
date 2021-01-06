<?php

class CtrlAdmin {
	function __construct($action) {
		global $rep,$vues;
		
		$dVueEreur = array ();
		try{
			switch($action) {

				case NULL:
					$this->afficheForum();
					break;

				case "ajoutArticle" :
					$this->ajoutArticle();
					break;

				case "confirmeAjout" :
					$this->confirmeAjout();
                    break;
                    
                case "supprArticle":
                    $this->supprArticle($_REQUEST['topic']);
                    break;

				default:
					$dVueEreur[] = "Erreur dans le switch de la vueP (Admin)";
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

	//ici !
	function ajoutArticle(){
		global $rep, $vues;
		$dVue = array (
				'nom' => "",
				'desc' => "",
				'date' => "",
				);
		require_once($rep.$vues['vueAjout']);
	}

	function confirmeAjout(){
		global $rep,$vues;
		$pseudo = $_SESSION['login'];
		$nom=$_POST['name'];
		$desc=$_POST['article'];
		$model = new Simplemodel();
		$model->ajouterArticle($pseudo, $nom, $desc);
		$this->afficheForum();
	}

    function supprArticle($idArticle){
        $model = new Simplemodel();
		$model->supprArticle($idArticle);
		$this->afficheForum();
    }
}