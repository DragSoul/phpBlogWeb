<html>
<head>
	<title>Connexion</title>
	<meta charset='utf-8' />    
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
</head>

<body>

<?php
if (isset($dVue))
{?>

<div align="center">

	<?php
	if (isset($dVueEreur) && count($dVueEreur)>0) {
	echo "<h2>ERREUR !!!!!</h2>";
	foreach ($dVueEreur as $value){
	    echo $value;
	}}
	?>

	<h2>Personne - formulaire</h2>
	<hr>

	<?php 
	if($_REQUEST['action'] == 'validationFormulaireCo'){
		echo 'Pseudo ou mot de passe incorrecte.';
	} 
	?>
	<form method="post" name="myform" id = "myform">
		<table>
			<tr>
				<td>login</td>
				<td><input name="txtLogin" value="<?= $dVue['login']  ?>" type="text" size="20" required></td>
			</tr>
			<tr>
				<td>MDP</td>
				<td><input name="txtPassword" value="<?= $dVue['password'] ?>" type="password" size="20" required></td>
			</tr>
			<tr>
		</table>
		<table> <tr>
				<td><input type="submit" value="Envoyer"></td>
				<td><input type="reset" value="Rétablir"></td>
			</tr> 
		</table>

		<input type="hidden" name="action" value="validationFormulaireCo">
	</form>
</div>

<?php }
else {
	print ("erreur !!<br>");
	print ("utilisation anormale de la vuephp");
} ?>
</body> 
</html> 