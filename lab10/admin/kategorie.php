<?php

class ZarzadzajKategoriami 
{
	private $conn;
	
	public function __construct($conn)
	{
		$this->conn = $conn;
	}
	
	public function DodajKategorie($nazwa, $matka = 0)
	{
		$nazwa = $this->conn->real_escape_string($nazwa);
		$matka = (int)$matka;
		
		$query = "INSERT INTO kategorie (matka, nazwa) VALUES ($matka, '$nazwa') LIMIT 1";
		$this->conn->query($query);
	}
	
	public function UsunKategorie($id)
	{
		$id = (int)$id;
		
		$query = "DELETE FROM kategorie WHERE id = $id LIMIT 1";
		$this->conn->query($query);
	}
	
	public function EdytujKategorie($id, $nazwa, $matka = NULL)
	{
		$id = (int)$id;
		
		#zmiana nazwy
		$name = $this->conn->real_escape_string($nazwa);
		$query = "UPDATE kategorie SET nazwa = '$nazwa' WHERE id = $id LIMIT 1";
		$this->conn->query($query);
		
		#zmiana matki
		if (!is_null($matka))
		{
			$matka = (int)$matka;
			$query2 = "UPDATE kategorie SET matka = '$matka' WHERE id = $id LIMIT 1";
			$this->conn->query($query2);
		}
	}
	
	public function PokazKategorie()
	{
		$query = "SELECT * FROM kategorie WHERE matka = 0 LIMIT 100";
		
		if ($result = $this->conn->query($query))
		{
			while ($row = $result->fetch_assoc())
			{
				echo $row['nazwa']. '
                 <form class="inline" method="post">
                     <input type="hidden" name="action" value="kategorie_edytuj">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Edytuj</button>
                 </form>
				 <form method="post" style="display: inline;">
                     <input type="hidden" name="action" value="kategorie_usun">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Usuń</button>
                 </form> <br />'
				 ;
				$this->PokazPodkategorie($row['id'], 1);
			}
		}
	}
	
	private function PokazPodkategorie($parentid, $level)
	{
		$query = "SELECT * FROM kategorie WHERE matka = $parentid LIMIT 100";
		
		if ($result = $this->conn->query($query))
		{
			while ($row = $result->fetch_assoc())
			{	
				echo str_repeat("&nbsp;&nbsp;", $level * 2) . "- " . $row['nazwa'] . '
                 <form class="inline" method="post">
                     <input type="hidden" name="action" value="kategorie_edytuj">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Edytuj</button>
                 </form>
				 <form class="inline" method="post">
                     <input type="hidden" name="action" value="kategorie_usun">
                     <input type="hidden" name="id" value="'.$row['id'].'">
                     <button type="submit">Usuń</button>
                 </form> <br />'
				 ;
				$this->PokazPodkategorie($row['id'], $level + 1);
			}
		}
	}
}

?>