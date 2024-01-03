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
	<!-- Menu -->
	<ul>
		<b>
			<li> <a class="active" href="index.php">Home</a> </li>
			<li> <a href="index.php?idp=kontakt">Kontakt</a> </li>
			<li> <a href="index.php?idp=skrypty">Skrypty </a> </li>
			<li> <a href="index.php?idp=filmy">Filmy</a> </li>
		</b>
	</ul>
<?php
	include('cfg.php');
	include('showpage.php');
	error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
	
	if($_GET['idp'] == '') $strona = 8;
	if($_GET['idp'] == 'kontakt') $strona = 7;
	if($_GET['idp'] == 'skrypty') $strona = 1;
	if($_GET['idp'] == 'filmy') $strona = 6;
	if($_GET['idp'] == 'wieloryb') $strona = 2;
	if($_GET['idp'] == 'womentalking') $strona = 3;
	if($_GET['idp'] == 'wszystkowszedzienaraz') $strona = 4;
	if($_GET['idp'] == 'zakliaczesloni') $strona = 5;
	
	echo PokazPodstrone($strona, $conn); #wyswietla stronę na podstawie zmiennej $_GET['idp']
	
	$nr_indeksu = '164372';
	$nrGrupy = '2';
	
	if($_GET['idp'] == '') echo 'Autor: Dawid Grabowski '.$nr_indeksu.' grupa '.$nrGrupy;
?>
</body>
</html>