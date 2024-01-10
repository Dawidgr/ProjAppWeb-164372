<?php

class ZarzadzajProduktami
{
	public $conn;
	
	public function __construct($conn)
	{
		$this->conn = $conn;
	}
	
	public function DodajProdukty($tytul, $opis, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
	{
		$now = new DateTime();
		$tytul = $this->conn->real_escape_string($tytul);
		$opis = $this->conn->real_escape_string($opis);
		$data_utworzenia = $now->format('Y-m-d H:i:s');
		$data_modyfikacji = $now->format('Y-m-d H:i:s');
		$data_wygasniecia = $this->conn->real_escape_string($data_wygasniecia);
		if($podatek_vat > 1)
		{
			$podatek_vat = $podatek_vat / 100;
		}
		$gabaryt_produktu = $this->conn->real_escape_string($gabaryt_produktu);
		$zdjecie = $this->conn->real_escape_string($zdjecie);
		
		$query = "INSERT INTO produkty (tytul, opis, data_utworzenia, data_modyfikacji, data_wygasniecia, cena_netto, podatek_vat, ilosc_dostepnych_sztuk, status_dostepnosci, kategoria, gabaryt_produktu, zdjecie) VALUES ('$tytul', '$opis', '$data_utworzenia', '$data_modyfikacji', '$data_wygasniecia', $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, '$gabaryt_produktu', '$zdjecie') LIMIT 1";
		$this->conn->query($query);
	}
	
	public function UsunProdukty($id)
	{
		$id = (int)$id;
		
		$query = "DELETE FROM produkty WHERE id = $id LIMIT 1";
		$this->conn->query($query);
	}
	
	public function EdytujProdukty($id, $tytul, $opis, $data_wygasniecia, $cena_netto, $podatek_vat, $ilosc_dostepnych_sztuk, $status_dostepnosci, $kategoria, $gabaryt_produktu, $zdjecie)
	{
		$id = (int)$id;
		$now = new DateTime();
		$tytul = $this->conn->real_escape_string($tytul);
		$opis = $this->conn->real_escape_string($opis);
		$data_modyfikacji = $now->format('Y-m-d H:i:s');
		$data_wygasniecia = $this->conn->real_escape_string($data_wygasniecia);
		if($podatek_vat > 1)
		{
			$podatek_vat = $podatek_vat / 100;
		}
		$gabaryt_produktu = $this->conn->real_escape_string($gabaryt_produktu);
		$zdjecie = $this->conn->real_escape_string($zdjecie);
		
		$query = "UPDATE produkty SET 
				tytul = '$tytul',
				opis = '$opis',
				data_modyfikacji = '$data_modyfikacji',
				data_wygasniecia = '$data_wygasniecia',
				cena_netto = $cena_netto,
				podatek_vat = $podatek_vat,
				ilosc_dostepnych_sztuk = $ilosc_dostepnych_sztuk,
				kategoria = $kategoria,
				status_dostepnosci = $status_dostepnosci,
				gabaryt_produktu = '$gabaryt_produktu',
				zdjecie = '$zdjecie' 
				WHERE id = $id LIMIT 1";
		$this->conn->query($query);
	}
		
		
	
	public function PokazProdukty()
	{
		$query = "SELECT * FROM produkty";
		
		if ($result = $this->conn->query($query))
		{
			while ($row = $result->fetch_assoc())
			{
				echo $row['tytul']. '
                 <form method="post" style="display: inline;">
                     <input type="hidden" name="action" value="produkty_edytuj">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Edytuj</button>
                 </form>
				 <form method="post" style="display: inline;">
                     <input type="hidden" name="action" value="produkty_usun">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Usuń</button>
                 </form> <br />'
				 ;
			}
		}
	}
}

?>