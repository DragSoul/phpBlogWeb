<?php

class Validation {

    static function val_action($action) {

        if (!isset($action)) {
            throw new Exception('pas d\'action');
        }
    }

    static function val_formCo(string &$nom, array &$dVueEreur) {

        if (!isset($nom)||$nom=="") {
            $dVueEreur[] = "pas de nom";
            $nom="";
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] = "tentative d'injection de code (attaque sécurité)";
            $nom="";
        }

    }

    static function val_formIn(string &$email, string &$nom, string &$age, array &$dVueEreur) {

        if (!isset($email)||$email=="") {
            $dVueEreur[] = "pas d'email";
            $email="";
        }

        if($email !== filter_var($email, FILTER_SANITIZE_EMAIL) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $dVueEreur[] = "email invalide";
            $email="";
        }

        if (!isset($nom)||$nom=="") {
            $dVueEreur[] = "pas de nom";
            $nom="";
        }

        if ($nom != filter_var($nom, FILTER_SANITIZE_STRING))
        {
            $dVueEreur[] = "tentative d'injection de code (attaque sécurité)";
            $nom="";
        }

    }

    static function sanitizeString($string):string{
        $stringSanitized = filter_var($string, FILTER_SANITIZE_STRING);
        if($string == $stringSanitized){
            return $stringSanitized;
        }
        $dVueEreur[] = "tentative d'injection de code (attaque sécurité)";
        return "";
    }

}
?>

        