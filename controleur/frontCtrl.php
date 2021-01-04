<?php

class FrontCtrl {

	function __construct() {
		global $rep,$vues;
		$lAction_Membre = array('deconnexion', 'repondre');
		$lAction_Admin = array('ajoutArticle', 'confirmeAjout', 'supprArticle');
		$dVueEreur = array ();
		try{
			$a = Simplemodel::IsMembre();
			if(isset($_REQUEST['action'])){
				$action=$_REQUEST['action'];
				echo $action;              ////////////////////to delete
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
			elseif(in_array($action, $lAction_Admin)){
				if($a == NULL){
					new CtrlUser($action);
				}
				else{
					new CtrlAdmin($action);
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