-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 04, 2024 at 12:35 AM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moja_strona`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategorie`
--

CREATE TABLE `kategorie` (
  `id` int(11) NOT NULL,
  `matka` int(11) NOT NULL DEFAULT 0,
  `nazwa` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategorie`
--

INSERT INTO `kategorie` (`id`, `matka`, `nazwa`) VALUES
(9, 0, 'Elektronika'),
(10, 9, 'Telefony'),
(11, 9, 'Konsole'),
(12, 0, 'Moda'),
(13, 12, 'Koszulki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `page_list`
--

CREATE TABLE `page_list` (
  `id` int(11) NOT NULL,
  `page_title` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `page_list`
--

INSERT INTO `page_list` (`id`, `page_title`, `page_content`, `status`) VALUES
(1, 'skrypty', '<script src=\"js/kolorujtlo.js\" type=\"text/javascript\"></script>\r\n<script src=\"js/timedate.js\" type=\"text/javascript\"></script>\r\n\r\n<body onload=\"startclock()\" style=\"background-image: none\">\r\n	<div class=\"zegar\">\r\n		<div id=\"zegarek\"></div>\r\n		<div id=\"data\"></div>\r\n	</div>\r\n	<br>\r\n	<div class=\"przyciski\"\r\n		<FORM METHOD=\"POST\" NAME=\"background\">\r\n			<INPUT TYPE=\"button\" VALUE=\"żółty\" ONCLICK=\"changeBackground(\'#FFF000\')\" style=\"background-color: yellow\">\r\n			<INPUT TYPE=\"button\" VALUE=\"czarny\" ONCLICK=\"changeBackground(\'#000000\')\" style=\"background-color: black;color:white;\">\r\n			<INPUT TYPE=\"button\" VALUE=\"biały\" ONCLICK=\"changeBackground(\'#FFFFFF\')\" style=\"background-color: white\">\r\n			<INPUT TYPE=\"button\" VALUE=\"zielony\" ONCLICK=\"changeBackground(\'#00FF00\')\" style=\"background-color: green;color:white;\">\r\n			<INPUT TYPE=\"button\" VALUE=\"niebieski\" ONCLICK=\"changeBackground(\'#0000FF\')\" style=\"background-color: blue;color:white;\">\r\n			<INPUT TYPE=\"button\" VALUE=\"pomarańczowy\" ONCLICK=\"changeBackground(\'#FF8000\')\" style=\"background-color: orange\">\r\n			<INPUT TYPE=\"button\" VALUE=\"szary\" ONCLICK=\"changeBackground(\'#c0c0c0\')\" style=\"background-color: gray\">\r\n			<INPUT TYPE=\"button\" VALUE=\"czerwony\" ONCLICK=\"changeBackground(\'#FF0000\')\" style=\"background-color: red\">\r\n		</FORM>\r\n	</div>\r\n\r\n	<div id=\"animacjaTestowa1\" class=\"test-block\">Kliknij, a się powiększe </div>\r\n		<script>\r\n			\r\n			$(\"#animacjaTestowa1\").on(\"click\",function(){\r\n				$(this).animate({\r\n					width: \"500px\",\r\n					opacity: 0.4,\r\n					fontSize: \"3em\",\r\n					borderwidth: \"10px\"\r\n				}, 1500);\r\n			});\r\n		</script>\r\n	\r\n	<div id=\"animacjaTestowa2\" class=\"test-block\">Najedź kursorem, a się powiększe</div>\r\n		<script>\r\n			\r\n			$(\"#animacjaTestowa2\").on({\r\n				\"mouseover\" : function() {\r\n					$(this).animate({\r\n						width: 300\r\n					}, 200);\r\n				},\r\n				\"mouseout\" : function() {\r\n					$(this).animate({\r\n						width: 200\r\n					}, 200);\r\n				}\r\n			});\r\n		</script>\r\n\r\n	<div id=\"animacjaTestowa3\" class=\"test-block\">Klikaj, abym urósł</div>\r\n		<script>\r\n			\r\n			$(\"#animacjaTestowa3\").on(\"click\", function(){\r\n				if (!$(this).is(\":animated\")) {\r\n					$(this).animate({\r\n						width: \"+=\" + 50,\r\n						height: \"+=\" + 10,\r\n						opacity: \"-=\" + 0.1,\r\n						duration: 3000\r\n					});\r\n				}\r\n			});\r\n		</script>\r\n	\r\n	\r\n</body>\r\n', 1),
(2, 'wieloryb', '<h1>Wieloryb</h1>\r\n<h2>Najlepszą charakteryzację i fryzury</h2>\r\n<br>\r\n<div class=\"obraz\"><img class=\"img2\" src=\"img/wieloryb1.jpg\" alt=\"Wieloryb - klatka z filmu nr1\"></div>\r\n<h2>opis ze strony tytułowej filmu:</h2>\r\n<p>Charlie już od lat żyje na marginesie świata uwięziony w małym mieszkaniu przez chorobliwą otyłość. Odrzucony, nie bez powodu, przez swoich bliskich, samotnie zmierza w życiową przepaść. Wystarczy jednak jeden impuls, jedno spotkanie, by zapalić w nim płomień nadziei na to, że jeszcze nie wszystko stracone. Charlie podejmuje próbę nawiązania dawno utraconego kontaktu z nastoletnią córką. Wie, że czeka go niesłychanie trudne spotkanie. Zdaje sobie sprawę, że ryzykuje utratę ostatniego złudzenia. Gotów jest jednak podjąć to ryzyko z wiarą, że także dla niego jest jeszcze szansa na odkupienie.</p>\r\n<div class=\"clearfix\"></div>\r\n<div class=\"obraz\"><img src=\"img/wieloryb2.jpg\" alt=\"Wieloryb - klatka z filmu nr2\"></div>\r\n<div class=\"obraz\"><img src=\"img/wieloryb3.jpg\" alt=\"Wieloryb - klatka z filmu nr3\"></div>\r\n', 1),
(3, 'womentalking', '<h1>Women Talking</h1>\r\n<h2>OSCAR za Najlepszy scenariusz adaptowany</h2>\r\n<br>\r\n<div class=\"obraz\"><img src=\"img/womentalking1.jpg\" alt=\"Women Talking - klatka z filmu\"></div>\r\n<h2>opis festiwalowy:</h2>\r\n<p>W \"Women Talking\" grupa kobiet, z których wiele nie zgadza się co do zasadniczych kwestii, toczy rozmowę, aby ustalić, w jaki sposób mogą wspólnie pójść naprzód, by zbudować lepszy świat dla siebie i swoich dzieci. Chociaż tło wydarzeń w \"Women Talking\" jest brutalne, sam film taki nie jest. Nie zobaczymy na ekranie przemocy, której doświadczyły te kobiety. Widzimy jedynie krótkie przebłyski jej następstw. Zamiast tego oglądamy wspólnotę kobiet, które łączą siły, ponieważ muszą w bardzo krótkim czasie zdecydować, jaka będzie ich wspólna reakcja.</p>\r\n<div class=\"clearfix\"></div>\r\n<div class=\"obraz\"><img src=\"img/womentalking2.jpg\" alt=\"Women Talking - klatka z filmu nr2\"></div>\r\n<div class=\"obraz\"><img src=\"img/womentalking3.jpg\" alt=\"Women Talking - klatka z filmu nr3\"></div>\r\n', 1),
(4, 'wszystkowszedzienaraz', '<h1>Wszystko wszędzie na raz</h1>\r\n<h2>OSCAR za Najlepszy film</h2>\r\n<br>\r\n<div class=\"obraz\"><img src=\"img/wszystkowszedzienaraz1.jpg\" alt=\"Wszystko wszędzie naraz - klatka z filmu nr1\"></div>\r\n<h2>opis dystrybutora kina:</h2>\r\n<p>Evelyn Wang (Michelle Yeoh), borykająca się z trudami codzienności mama w średnim wieku, natrafia na klucz do \"multiwersum\": sieci przecinających się ze sobą światów, gdzie może zbadać wszystkie drogi życiowe, którymi nie poszła: począwszy od gwiazdy filmowej do uznanego szefa kuchni Teppanyaki. Kiedy pojawiają się mroczne siły, Evelyn będzie musiała wykorzystać wszystko co ma i wszystko czym kiedyś mogła być, aby ocalić to, co jest dla niej najważniejsze: jej rodzinę.\r\nDzięki niesamowitym scenom sztuk walki, lekkiemu humorowi w stylu pop oraz przyprawiającym o bicie serca emocjom, to epicki i porywający film, jakiego nigdy wcześniej nie widzieliście.</p>\r\n<div class=\"clearfix\"></div>\r\n<div class=\"obraz\"><img src=\"img/wszystkowszedzienaraz2.jpg\" alt=\"Wszystko wszędzie naraz - klatka z filmu nr2\"></div>\r\n<div class=\"obraz\"><img src=\"img/wszystkowszedzienaraz3.jpg\" alt=\"Wszystko wszędzie naraz - klatka z filmu nr3\"></div>\r\n', 1),
(5, 'zaklinaczesloni', '<h1>Zaklinacze Słoni</h1>\r\n<h2>OSCAR za Najlepszy krótkometrażowy film dokumentalny</h2>\r\n<br>\r\n<div class=\"obraz\"><img class=\"img2\" src=\"img/zaklinaczesloni1.jpg\" alt=\"Zaklinacze Słoni - klatka z filmu nr1\"></div>\r\n<h2>opis ze strony tytułowej filmu:</h2>\r\n<p>Bomman i Bellie z południa Indii poświęcają życie opiece nad osieroconym słoniątkiem o imieniu Raghu, tworząc rodzinę jak żadna inna.</p>\r\n<div class=\"clearfix\"></div>\r\n<div class=\"obraz\"><img src=\"img/zakliczanesloni2.webp\" alt=\"Zaklinacze Słoni - klatka z filmu nr2\"></div>\r\n', 1),
(6, 'filmy', '<h1>Zwiastuny filmów Oscarowych</h1>\r\n<p>Wszystko wszędzie naraz<br/></p>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/hapbLrVolks?si=8FIpkihP8bhl2QJr\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n<br/>\r\n<br/>\r\n<p>Women Talking<br/></p>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/pD0mFhMqDCE?si=nvvZHL8wslhuuN9g\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>\r\n<br/>\r\n<br/>\r\n<p>Wieloryb<br/></p>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube-nocookie.com/embed/H5ZgOkIujc4?si=bdBI8j1_9z-X-Wrd\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1),
(7, 'kontakt', '<h1>Kontakt</h1>\r\n<form action=\"mailto:jakismail@przyklad.pl\" method=\"post\" enctype=\"text/plain\">\r\n		Imie i Nazwisko:\r\n		<br>\r\n		<input type=\"text\" name=\"name\">\r\n		<br>\r\n		E-mail:\r\n		<br>\r\n		<input type=\"text\" name=\"mail\">\r\n		<br>\r\n		Wiadomość:\r\n		<br>\r\n		<textarea id=\"message\" name=\"message\" rows=\"4\" required></textarea>\r\n		<br>\r\n		<input type=\"submit\" value=\"Wyślij\">\r\n		<input type=\"reset\" value=\"Zresetuj\">\r\n</form>\r\n', 1),
(8, 'glowna', '<h1>Filmy Oscarowe</h1>\n\n<table>\n    <tr>\n        <td>\n            <p><a href=\"index.php?idp=wszystkowszedzienaraz\"><i><b>Wszystko wszędzie naraz</b></i></a></p>\n			<p><br>Najlepszy film</p>\n			<div id=\"moveout\" class=\"film\"><a href=\"index.php?idp=wszystkowszedzienaraz\"><img src=\"img/wszystkowszedzienaraz.jpg\" class=\"img1\" alt=\"Wszystko wszędzie naraz plakat\"></a></div>\n        </td>\n	</tr>	\n	<tr>\n        <td>\n            <p><a href=\"index.php?idp=womentalking\"><i><b>Women Talking</b></i></a></p>\n			<p><br>Najlepszy scenariusz adaptowany</p>\n			<div id=\"moveout\" class=\"film\"><a href=\"index.php?idp=womentalking\"><img src=\"img/womentalking.jpg\" class=\"img1\" alt=\"Women Talking plakat\"></a></div>\n        </td>\n    </tr>\n    <tr>\n        <td>\n            <p><a href=\"index.php?idp=zakliaczesloni\"><i><b>Zaklinacze Słoni</b></i></a></p>\n			<p><br>Najlepszy krótkometrażowy film dokumentalny</p>\n			<div id=\"moveout\" class=\"film\"><a href=\"index.php?idp=zakliaczesloni\"><img src=\"img/zaklinaczesloni.jpg\" class=\"img1\" alt=\"Zaklinacze Słoni plakat\"></a></div>\n        </td>\n	</tr>	\n	<tr>\n        <td>\n            <p><a href=\"index.php?idp=wieloryb\"><i><b>Wieloryb</b></i></a></p>\n			<p><br>Najlepszą charakteryzację i fryzury</p>\n			<div id=\"moveout\" class=\"film\"><a href=\"index.php?idp=wieloryb\"><img src=\"img/wieloryb.jpg\" class=\"img1\" alt=\"Wieloryb plakat\"></a></div>\n        </td>\n    </tr>\n</table>\n\n<u>\n	<p>\n		<b>\n			<i>\n				<h3>\n					<span style=\"color:red\">Źródło informacji: <a href=\"https://www.filmweb.pl/awards/Oscary/2023\">Filmweb.pl</a></span>\n				</h3>\n			</i>\n		</b>\n	</p>\n</u>\n	<!-- Powiekszenie obrazu po najechaniu kursorem -->\n	<script>\n	$(\"#moveout img\").on({\n		\"mouseover\" : function() {\n			$(this).animate({\n				width: \"350px\",\n			}, 500);\n		},\n		\"mouseout\" : function() {\n			$(this).animate({\n				width: \"300px\",\n			}, 500);\n		}\n	});\n		\n	</script>\n	\n</body>\n</html>\n', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `opis` text NOT NULL,
  `data_utworzenia` datetime NOT NULL,
  `data_modyfikacji` datetime NOT NULL,
  `data_wygasniecia` date NOT NULL,
  `cena_netto` decimal(11,2) NOT NULL,
  `podatek_vat` decimal(3,2) NOT NULL,
  `ilosc_dostepnych_sztuk` int(11) NOT NULL,
  `status_dostepnosci` tinyint(1) NOT NULL,
  `kategoria` int(11) NOT NULL,
  `gabaryt_produktu` varchar(255) NOT NULL,
  `zdjecie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produkty`
--

INSERT INTO `produkty` (`id`, `tytul`, `opis`, `data_utworzenia`, `data_modyfikacji`, `data_wygasniecia`, `cena_netto`, `podatek_vat`, `ilosc_dostepnych_sztuk`, `status_dostepnosci`, `kategoria`, `gabaryt_produktu`, `zdjecie`) VALUES
(1, 'Smartphone XYZ', 'Nowoczesny telefon.', '2024-01-03 21:55:24', '2024-01-03 21:55:24', '2024-01-03', 799.99, 0.23, 100, 1, 10, '145 x 70 x 8 mm', 'produkty/smartphonexyz.jpg'),
(2, 'Koszulka XYZ', 'Stylowa koszulka.', '2024-01-03 22:04:30', '2024-01-03 22:04:30', '2024-04-09', 89.99, 0.23, 250, 1, 13, 'XL', 'produkty/koszulkaxyz.jpg'),
(3, 'Konsola XYZ', 'Przenośna konsola do gier.', '2024-01-03 22:06:23', '2024-01-03 22:06:23', '2024-03-17', 1599.99, 0.23, 75, 1, 11, '‎18 x 19,8 x 18 cm', 'produkty/konsolaxyz.jpg'),
(4, 'test tytul', 'test opis', '2024-01-03 22:52:47', '2024-01-03 22:52:47', '2023-03-03', 34.32, 0.23, 150, 1, 10, 'test gabaryty', 'produkty/testzdjecie.jpg'),
(5, 'test tytul1', 'test opis', '2024-01-03 22:53:05', '2024-01-03 22:53:05', '2023-03-03', 34.32, 0.23, 150, 1, 10, '', 'produkty/testzdjecie.jpg'),
(6, 'test tytul2', 'test opis', '2024-01-03 22:53:13', '2024-01-03 22:53:13', '2023-03-03', 34.32, 0.23, 150, 1, 10, '', 'produkty/testzdjecie.jpg');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategorie`
--
ALTER TABLE `kategorie`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `page_list`
--
ALTER TABLE `page_list`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategorie`
--
ALTER TABLE `kategorie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `page_list`
--
ALTER TABLE `page_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `produkty`
--
ALTER TABLE `produkty`
  ADD CONSTRAINT `fk_kategoria` FOREIGN KEY (`kategoria`) REFERENCES `kategorie` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
