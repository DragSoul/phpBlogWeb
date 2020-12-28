<html>
<head>
	<meta charset='utf-8' />
    <title>Erreur</title>
    
    <link rel="stylesheet" type="text/css" href="css/general.css" />
    <link rel="shortcut icon" href="images/favicon.ico" />
    <link href='http://fonts.googleapis.com/css?family=Karla' rel='stylesheet' type='text/css'>
</head>

<body>

<h1>ERREUR !!!!!</h1>
<?php
if (isset($dVueEreur)) {
	foreach ($dVueEreur as $value){
    	echo $value;
    }
}
?>



</body> 
</html>