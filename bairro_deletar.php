<? 
	include('conecta.php'); 
	$id = (int) $_GET['id']; 
	mysql_query("DELETE FROM `bairros` WHERE `id` = '$id' ") ; 
	echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
	header("LOCATION: bairro_listar.php");  
?>