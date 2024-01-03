<?php
	$servername = 'localhost';
	$username = 'root';
	$password = '';
	$login = 'admin';
	$pass = '123';
	$db = 'moja_strona';
	$conn = new mysqli($servername, $username, $password, $db);
	global $conn;
	if ($conn->connect_error) {
		die('Connection failed: '. $conn->connect_error);
	}

?>