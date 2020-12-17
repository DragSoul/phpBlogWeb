<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr"> 
   <head> 
      <title>Blog</title> 
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
   </head> 
<body> 
   <h2>Blog</h2> 
   <hr /> 
   <?php 
   $connect = mysqli_connect("127.0.0.1", "root", "", "dbblog"); 
 
   /* Vérification de la connexion */ 
   if (!$connect) { 
      echo "Échec de la connexion : ".mysqli_connect_error(); 
      exit(); 
   } 
 
   $requete = "SELECT * FROM article ORDER BY Date DESC"; 
   if ($resultat = mysqli_query($connect,$requete)) { 
      date_default_timezone_set('Europe/Paris'); 
      /* fetch le tableau associatif */ 
      while ($ligne = mysqli_fetch_assoc($resultat)) { 
         $dt_debut = date_create_from_format('Y-m-d H:i:s', $ligne['Date']); 
         echo "<h3>".$ligne['Titre']."</h3>"; 
         echo "<h4>Le ".$dt_debut->format('d/m/Y H:i:s')."</h4>"; 
         echo "<div style='width:400px'>".$ligne['Commentaire']." </div>"; 
         if ($ligne['Photo'] != "") { 
            echo "<img src='photos/".$ligne['Photo']."' width='200px' height='200px'/>"; 
         }
         echo "<h4>".$ligne['Pseudo']."</h4>";
         echo "<hr />"; 
      } 
   } 
   ?> 
   <br /> 
   <a href="formulaireAjout.php" >retour à la page d'insertion</a> 
</body> 
</html>