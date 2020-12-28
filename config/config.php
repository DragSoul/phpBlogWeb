<?php

//gen
$rep=__DIR__.'/../';

// liste des modules à inclure

//$dConfig['includes']= array('controleur/Validation.php');



//BD

$dsn = 'mysql:host=localhost;dbname=dbblog';
$base = "dbblog";
$user = 'root';
$mdp = '';

//Vues

$vues['erreur']='vues/erreur.php';
$vues['vueConnexion']='vues/vueConnexion.php';
$vues['vueInscription']='vues/vueInscription.php';
$vues['vuePrincipale']='vues/vuePrincipale.php';
$vues['vueP']='vues/vueP.php';
$vues['vueAjout']='vues/vueAjout.php';
$vues['vueSujet']='vues/vueSujet.php';




?>