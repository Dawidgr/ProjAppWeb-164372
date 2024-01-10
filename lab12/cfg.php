<?php
# Połączenie się z bazą danych
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$db = 'moja_strona';
	$conn = new mysqli($servername, $username, $password, $db);
	global $conn;
	if ($conn->connect_error) {
		die('Connection failed: '. $conn->connect_error);
	}
	
	# login i hasło do admina
	$login = 'admin';
	$pass = '123';
	
?>