<?php 
$connect = mysqli_connect("127.0.0.1", "root", "", "dbblog"); 
 
/* Vérification de la connexion */ 
if (!$connect) { 
   echo "Échec de la connexion : ".mysqli_connect_error(); 
   exit(); 
} 
 
if ($_FILES['photo']['error']) {  
   switch ($_FILES['photo']['error']){  
         case 1: // UPLOAD_ERR_INI_SIZE  
            echo "La taille du fichier est plus grande que la limite autorisée par le serveur (paramètre upload_max_filesize du fichier php.ini).";  
            break;  
         case 2: // UPLOAD_ERR_FORM_SIZE  
            echo "La taille du fichier est plus grande que la limite autorisée par le formulaire (paramètre post_max_size du fichier php.ini)."; 
            break;  
         case 3: // UPLOAD_ERR_PARTIAL  
            echo "L'envoi du fichier a été interrompu pendant le transfert."; 
    
            break;  
         case 4: // UPLOAD_ERR_NO_FILE  
           echo "La taille du fichier que vous avez envoyé est nulle."; 
            break;  
      }  
}  
else {  
//s'il n'y a pas d'erreur alors $_FILES['nom_du_fichier']['error'] 
//vaut 0  
   echo "Aucune erreur dans le transfert du fichier.<br />"; 
   if ((isset($_FILES['photo']['name'])&&($_FILES['photo']['error'] == UPLOAD_ERR_OK))) { 
      $chemin_destination = 'photos/'; 
      //déplacement du fichier du répertoire temporaire (stocké 
      //par défaut) dans le répertoire de destination 
      move_uploaded_file($_FILES['photo']['tmp_name'], $chemin_destination.$_FILES['photo']['name']); 
      echo "Le fichier ".$_FILES['photo']['name']." a été copié dans le répertoire photos"; 
   } 
   else { 
      echo "Le fichier n'a pas pu être copié dans le répertoire photos."; 
   } 
} 

$requete = "INSERT INTO article (Pseudo, Titre, Date, Commentaire, Photo) VALUES ('".htmlentities(addslashes($_POST['pseudo']), ENT_QUOTES)."','".htmlentities(addslashes($_POST['titre']), ENT_QUOTES)."','".date("Y-m-d H:i:s")."','".htmlentities (addslashes($_POST['commentaire']), ENT_QUOTES)."', '".$_FILES['photo']['name']."')"; 
$resultat = mysqli_query($connect,$requete);
$identifiant = mysqli_insert_id($connect);
/* Fermeture de la connexion */ 
mysqli_close($connect); 
 
if ($identifiant != 0) { 
   echo "<br />Ajout du commentaire réussi.<br /><br />"; 
} 
else { 
   echo "<br />Le commentaire n'a pas pu être ajouté.<br /><br />"; 
} 
?> 
<a href="formulaireAjout.php" >retour à la page d'ajout d'articles</a>