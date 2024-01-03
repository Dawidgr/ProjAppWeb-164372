<?php

#========================#
# funkcja pokazKontakt   #
#========================#
# Wyświetla formularz do
# wyslania maila oraz
# przypomnienia hasła 
#========================#
function pokazKontakt()
{
    echo '
        <html>
        <head>
            <title>Formularz Kontaktowy</title>
            <link rel="stylesheet" type="text/css" href="styles.css"> <!-- Tutaj podaj ścieżkę do arkusza stylów CSS -->
        </head>
        <body>
            <form action="" method="post">
                <label for="temat">Temat:</label>
                <input type="text" name="temat" required><br>

                <label for="email">Email:</label>
                <input type="email" name="email" required><br>

                <label for="tresc">Treść:</label>
                <textarea name="tresc" rows="4" cols="50" required></textarea><br>

                <input type="submit" value="Wyślij">
            </form>

            <form action="" method="post">
                <label for="email_przypomnienie">Email:</label>
                <input type="email" name="email_przypomnienie" required><br>

                <input type="submit" value="Przypomnij hasło">
            </form>
        </body>
        </html>';
}


#===========================#
# funkcja wyslijMailkontakt #
#===========================#
# wysyła maila oraz
# wyświetla komunikat o
# pomyślnym wysłaniu wiadomości
#===========================#
function wyslijMailkontakt($odbiorca, $temat, $tresc, $sender)
{
    $mail['subject'] = $temat;
    $mail['body'] = $tresc;
    $mail['sender'] = $sender;
    $mail['recipient'] = $odbiorca;

    $header = "From: Formularz kontaktowy <" . $mail['sender'] . ">\n";
    $header .= "MIME-Version: 1.0\nContent-Type: text/plain; charset=utf-8\nContent-Transfer-Encoding: 8bit\n";
    $header .= "x-Sender: <" . $mail['sender'] . ">\n";
    $header .= "x-Mailer: PRapWWW mail 1.2\n";
    $header .= "x-Priority: 3\n";
    $header .= "Return-Path: <" . $mail['sender'] . ">\n";

    mail($mail['recipient'], $mail['subject'], $mail['body'], $header);
    echo '[wiadomosc_wyslana]';
}


#===========================#
# funkcja przypomnijHaslo   #
#===========================#
# wysyla hasło admina
# na maila podanego w formularzu 
# z funkcji PokazKontakt
#===========================#
function przypomnijHaslo($odbiorca, $sender)
{
    $haslo = "123";

    wyslijMailkontakt($odbiorca, "Przypomnienie hasła", "Twoje nowe hasło: " . $haslo . "\n\nWiadomość od: " . $sender, $sender);
}

// Jeżeli formularz POST został wysłany, wyślij maila lub przypomnij hasło
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email'])) {
        wyslijMailkontakt('adres@firmy.pl', $_POST['temat'], $_POST['tresc'], $_POST['email']);
    } elseif (isset($_POST['email_przypomnienie'])) {
        przypomnijHaslo($_POST['email_przypomnienie'], 'adres@firmy.pl');
    }
} else {
    // Jeśli formularz nie został jeszcze wysłany, pokaż formularz
    pokazKontakt();
}

?>
