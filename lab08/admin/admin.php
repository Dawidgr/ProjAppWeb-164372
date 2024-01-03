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

function ZapiszEdycje($id, $tytul, $tresc, $aktywna) 
{
    global $conn;
	
    $tytul = mysqli_real_escape_string($conn, $tytul);
    $tresc = mysqli_real_escape_string($conn, $tresc);
	
    $sql = 'UPDATE page_list SET page_title="'.$tytul.'", page_content="'.$tresc.'", status='.$aktywna.' WHERE id='.$id.' LIMIT 1';

    if (mysqli_query($conn, $sql)) {
        return "Edycja zapisana pomyślnie.";
    } else {
        return "Błąd podczas zapisywania edycji: " . mysqli_error($conn);
    }
}

function DodajNowaPodstrone()
{
	echo '
        <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
			<label for="tytul">Tytuł:</label>
            <input type="text" name="tytul" value=""><br>

            <label for="tresc">Treść strony:<br>:</label>
            <textarea name="tresc" rows="10" cols="50"></textarea><br>

            <label for="aktywna">Aktywna:</label>
            <input type="checkbox" name="aktywna"><br>

            <input type="submit" name="dodaj_nowa" value="Dodaj nową podstronę">
        </form>
        
        <form method="post">
            <input type="hidden" name="action" value="wróć">
            <button type="submit">Wróć</button>
        </form>';	
}

function UsunPodstrone($id)
{
	global $conn;
	
    $query = "SELECT * FROM page_list WHERE id ='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
	
	echo 'Czy na pewno usunąć id: '.$row['id'].' page_title: '.$row['page_title'] .'?<br />';
	echo '
		<form method="post" action="'.$_SERVER['REQUEST_URI'].'">
				<input type="hidden" name="id" value="' . $row['id'] . '">
                <input type="hidden" name="action" value="usun_strone">
                <button type="submit" name="usun_strone">Usuń stronę</button>
            </form>
		
		<form method="post">
            <input type="hidden" name="action" value="wróć">
            <button type="submit">Wróć</button>
        </form>';
	
}

function EdytujPodstrone($id)
{
    global $conn;
	
    $query = "SELECT * FROM page_list WHERE id ='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    echo 'Edycja id: '.$row['id'].' page_title: '.$row['page_title'] .'<br />';
    echo '
        <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
			<input type="hidden" name="id" value="' . $row['id'] . '">
		
            <label for="tytul">Tytuł:</label>
            <input type="text" name="tytul" value="' . $row['page_title'] . '"><br>

            <label for="tresc">Treść strony:</label>
            <textarea name="tresc" rows="10" cols="50">' . $row['page_content'] . '</textarea><br>

            <label for="aktywna">Aktywna:</label>
            <input type="checkbox" name="aktywna" ' . ($row['status'] ? 'checked' : '') . '><br>

            <input type="submit" name="zapisz_zmiany" value="Zapisz zmiany">
        </form>
        
        <form method="post">
            <input type="hidden" name="action" value="wróć">
            <button type="submit">Wróć</button>
        </form>';
}


function ListaPodstron()
{
    global $conn;
	
    if (isset($_POST['action']) && $_POST['action'] === 'edytuj') {
        EdytujPodstrone($_POST['id']);
    } elseif(isset($_POST['action']) && $_POST['action'] === 'nowa_strona') {
		DodajNowaPodstrone();
	} elseif(isset($_POST['action']) && $_POST['action'] === 'usun')
		UsunPodstrone($_POST['id']);
	else {
		
		echo '
            <form method="post" action="'.$_SERVER['REQUEST_URI'].'">
                <input type="hidden" name="action" value="nowa_strona">
                <button type="submit">Dodaj Nową Stronę</button>
            </form>
            ';
			
        $query = "SELECT * FROM page_list ORDER BY id ASC LIMIT 100";
        $result = mysqli_query($conn, $query);
        while($row = mysqli_fetch_array($result))
        {
            echo 'id: '.$row['id'].' page_title: '.$row['page_title'].'
                 <form method="post">
                     <input type="hidden" name="action" value="edytuj">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Edytuj</button>
                 </form>
				 <form method="post">
                     <input type="hidden" name="action" value="usun">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Usuń</button>
                 </form> <br />'
				 ;
        }
    }
}

if (!isset($_SESSION['zalogowany'])) {
    $_SESSION['zalogowany'] = false;
}

if ($_SESSION['zalogowany'] !== true) {
    if (isset($_POST['login_mail'])) {
        if ($_POST['login_mail'] == $login && $_POST['login_pass'] == $pass) {
            $_SESSION['zalogowany'] = true;
            echo 'Logowanie powiodło się. <br /><br />';
        } else {
            echo 'Błąd logowania. Spróbuj ponownie.';
            echo FormularzLogowania();
        }
    } else {
        echo FormularzLogowania();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["zapisz_zmiany"])) {
        
        $tytul = $_POST['tytul'];
        $tresc = $_POST['tresc'];
        $id = $_POST['id'];
        $aktywna = isset($_POST['aktywna']) ? 1 : 0;

        
        ZapiszEdycje($id, $tytul, $tresc, $aktywna);
		
} elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["dodaj_nowa"])) {
		global $conn;
		
		$tytul = $_POST['tytul'];
        $tresc = $_POST['tresc'];
		$tytul = mysqli_real_escape_string($conn, $tytul);
		$tresc = mysqli_real_escape_string($conn, $tresc);
        $aktywna = isset($_POST['aktywna']) ? 1 : 0;

		$sql = 'INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES (NULL, "'.$tytul.'", "'.$tresc.'", '.$aktywna.') LIMIT 1';
		
        if (mysqli_query($conn, $sql)) {
        return "Nowa podstrona dodana pomyślnie.";
		} else {
			return "Błąd podczas dodawania nowej podstrony: " . mysqli_error($conn);
		}
} elseif($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["usun_strone"]))
{
		global $conn;
		
		$id = $_POST['id'];
		$sql = 'DELETE FROM page_list WHERE id = '.$id.' LIMIT 1';
		if (mysqli_query($conn, $sql)) {
        return "Podstrona została usunięta pomyślnie.";
		} else {
			return "Błąd podczas usuwania podstrony: " . mysqli_error($conn);
		}
}


if ($_SESSION['zalogowany'] === true) {
    ListaPodstron();
}
?>
