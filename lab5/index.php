<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
	<meta http-equiv="Content-Language" content="pl" />
	<meta name="Author" content="Dawid Grabowski" />
	<link rel="stylesheet" href="css/mystyle.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<title>Filmy Oscarowe</title>
</head>

<body>
	<ul>
		<b>
			<li><a class="active" href="index.php">Home</a></li>
			<li><a href="index.php?idp=kontakt">Kontakt</a></li>
			<li><a href="index.php?idp=skrypty">Skrypty</a></li>
			<li><a href="index.php?idp=filmy">Filmy</a></li>
		</b>
	</ul>
<?php
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	
	if($_GET['idp'] == '') $strona = 'html/glowna.html';
	if($_GET['idp'] == 'kontakt') $strona = 'html/kontakt.html';
	if($_GET['idp'] == 'skrypty') $strona = 'html/skrypty.html';
	if($_GET['idp'] == 'filmy') $strona = 'html/filmy.html';
	if($_GET['idp'] == 'wieloryb') $strona = 'html/wieloryb.html';
	if($_GET['idp'] == 'womentalking') $strona = 'html/womentalking.html';
	if($_GET['idp'] == 'wszystkowszedzienaraz') $strona = 'html/wszystkowszedzienaraz.html';
	if($_GET['idp'] == 'zakliaczesloni') $strona = 'html/zaklinaczesloni.html';
	
	if (file_exists($strona)) {
		include($strona);
	}
	else {
		echo 'Plik '.$strona.' nie istnieje. <br/><br/>';
	}
?>
</body>
</html>