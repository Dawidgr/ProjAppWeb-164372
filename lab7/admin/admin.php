<?php
	session_start();
	
	include('../cfg.php');
	
	function FormularzLogowania()
	{
		$wynik = '
		<div class="logowanie">
		 <h1 class="heading">Panel CMS:</h1>
		  <div class="logowanie">
		   <form method="post" name="LoginForm" enctype="multipart/form-data" action="'.$_SERVER['REQUEST_URI'].'">
		    <table class="logowanie">
			 <tr><td class="log4_t">[email]</td><td><input type="text" name="login_mail" class="logowanie" /></td></td>
			 <tr><td class="log4_t">[haslo]</td><td><input type="password" name="login_pass" class="logowanie" /></td></td>
			 <tr><td>&nbsp;</td><td><input type="submit" name="x1_submit" class="logowanie" value="Zaloguj" /></td></tr>
			</table>
		   </form>
		  </div>
		 </div>
		';
		return $wynik;
	}
	
	function ListaPodstron()
	{
		global $conn;
		$query = "SELECT * FROM page_list ORDER BY id ASC LIMIT 100";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result))
		{
			echo 'id: '.$row['id'].' page_title: '.$row['page_title'].'
			 <button onclick="Usun('.$row['id'].')">Usun</button>
			 <button onclick="EdytujPodstrone('.$row['id'].')">Edytuj</button> <br />';
		}
	}
	
	function EdytujPodstrone($id)
	{
		global $conn;
		$query = "SELECT * FROM page_list WHERE id ='$id' LIMIT 1";
		$result = mysqli_query($conn, $query);
		$row = mysqli_fetch_array($result);
		echo 'id: '.$row['id'].' page_title: '.$row['page_title'] <br />;
		echo '
			<form method="post" action="">
				<label for="tytul">Tytuł: </label>
				<input type="text" name="tytul" value="'.$row['page_tytle'].'" <br />
				<label for=tresc">Treść podstrony
	}
	
	if(!isset($_SESSION['zalogowany']));
	{
		$_SESSION['zalogowany'] = false;
	}
		
	if ($_SESSION['zalogowany'] !== true) 
	{
		if(isset($_POST['login_mail']))
		{
			if ($_POST['login_mail'] == $login && $_POST['login_pass'] == $pass)
			{
				$_SESSION['zalogowany'] = true;
				echo 'Logowanie powiodło się. <br /><br />';
			}
			else
			{
				echo 'Błąd logowania. Spróbuj ponownie.';
				echo FormularzLogowania();
			}
		}
		else
		{
			echo FormularzLogowania();
		}
	}
	
	if($_SESSION['zalogowany'] == true)
	{
		ListaPodstron();
	}
	
	EdytujPodstrone(1);
?>