<!DOCTYPE html>
<head>
<meta charset='utf-8' />
    <title>Mon super forum !</title>
    
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
if (isset($dVue))
{?>

<body>
	<h1>Ajouter un article</h1>
    
	<div id="Cforum">
		<?php 
		if(isset($_SESSION['role'])){
			echo 'Bienvenue, '.$_SESSION['login'];?>
			
			<form method="post" id="deconnexion">
				<td><input type="submit" value="Deconnexion"></td>
				<input type="hidden" name="action" value="deconnexion">
			</form>
		<?php
		}
		?>
		<form method="post" id="newPost">
			<br><input type="text" name="name" placeholder="Nom de l'article..." required/><br>
			<textarea name="article" placeholder="Contenu de l'article..."></textarea><br>
			<input type="hidden" name="action" value="confirmeAjout">
			<input type="submit" value="Ajouter l'article" />
			<?php 
			if(isset($erreur)){
				echo $erreur;
			}
			?>
		</form>
	</div>

<?php
}
else {
	print ("erreur !!<br>");
	print ("utilisation anormale de la vuephp");
} ?>
</body> 
</html> 