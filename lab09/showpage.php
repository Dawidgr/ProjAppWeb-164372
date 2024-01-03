<?php
#========================#
# funkcja PokazPodstrone #
#========================#
# Zwraca zawartość strony z bazy danych mysqli
# przy użyciu id strony
#========================#
function PokazPodstrone($id, $conn)
{
	$id_clear = htmlspecialchars($id); #zabezpieczenie przed CODE INJECTION
	
	$query = "SELECT * FROM page_list WHERE id ='$id_clear' LIMIT 1";
	$result = mysqli_query($conn,$query);
	$row = mysqli_fetch_array($result);
	
	if(empty($row['id']))
	{
		$web = '[nie_znaleziono_strony]';
	}
	else
	{
		$web = $row['page_content'];
	}
	return $web;
}


?>