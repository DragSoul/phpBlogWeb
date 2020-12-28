<html>
<head>
	<meta charset='utf-8' />
    <title>Inscription</title>
    
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

	<form method="post" name="myform" id = "myform">
		<table>
			<tr>
				<td>e-mail</td>
				<td><input name="txtEmail" value="<?= $dVue['email']  ?>" type="emai" size="40" required></td>
			</tr>
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

		<input type="hidden" name="action" value="validationFormulaireIn">
	</form>
</div>

<?php }
else {
	print ("erreur !!<br>");
	print ("utilisation anormale de la vuephp");
} ?>
</body> 
</html> 