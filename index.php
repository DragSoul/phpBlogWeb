<?php
//si pb de tableau : print_r()
//si controller pas objet
//  header('Location: controler/controler.php');

//si controller objet

//chargement config
require_once(__DIR__.'/config/config.php');

//chargement autoloader pour autochargement des classes
require_once(__DIR__.'/config/Autoload.php');
Autoload::charger();
session_start();

$cont = new FrontCtrl();


?>

