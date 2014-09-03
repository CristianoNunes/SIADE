<? 
	include('conecta.php'); 
	if (isset($_POST['submitted'])) { 
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
	$sql = "INSERT INTO `ruas` ( `nome_rua`  ) VALUES(  '{$_POST['nome_rua']}'  ) "; 
	mysql_query($sql) or die(mysql_error()); 
	header("LOCATION: rua_listar.php"); 
} 
?>