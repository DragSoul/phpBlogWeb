<?php

class FrontCtrl {

	function __construct() {
		global $rep,$vues;
		$lAction_Membre = array('ajoutSujet', 'deconnexion', 'confirmeAjout', 'repondre');
		$dVueEreur = array ();
		try{
			$a = Simplemodel::IsMembre();
			if(isset($_REQUEST['action'])){
				$action=$_REQUEST['action'];
				echo $action;
			}
			else{
				$action = NULL;
			}
			if (in_array($action, $lAction_Membre)){
				if($a == NULL){
					new CtrlUser($action);
				}
				else{
					new CtrlMembre($action);
				}
			}
			else{
				new CtrlUser($action);
			}
			
		}
		catch(Exception $e){
			require($rep.$vues['erreur']);
		}
	}
}
?>