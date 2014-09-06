<? 
	include('conecta.php'); 
	if (isset($_POST['submitted'])) { 
	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
	$sql = "INSERT INTO `imovel` ( `idImovel` ,  `quantidade_habitantes` ,  `idTipoImovel` ,  `quantidade_caes` ,  `quantidade_gatos` ,  `numero_imovel` ,  `ladoquadra` ,  `Rua_id` ,  `Quadra_idQuadra`  ) VALUES(  '{$_POST['idImovel']}' ,  '{$_POST['quantidade_habitantes']}' ,  '{$_POST['idTipoImovel']}' ,  '{$_POST['quantidade_caes']}' ,  '{$_POST['quantidade_gatos']}' ,  '{$_POST['numero_imovel']}' ,  '{$_POST['ladoquadra']}' ,  '{$_POST['Rua_id']}' ,  '{$_POST['Quadra_idQuadra']}'  ) "; 
	mysql_query($sql) or die(mysql_error()); 
	header("LOCATION: imovel_listar.php");
} 
?>