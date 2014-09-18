<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
//foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
//$sql = "INSERT INTO `trabalha` ( `agente_id_agente` ,  `ciclo_id_ciclo` ,  `quadra_id_quadra` ,  `quadra_bairro_id_bairro`  ) VALUES(  '{$_POST['agente_id_agente']}' ,  '{$_POST['ciclo_id_ciclo']}' ,  '{$_POST['quadra_id_quadra']}' ,  '{$_POST['quadra_bairro_id_bairro']}'  ) "; 

$resultado_select = $_POST['quadra_id_quadra'];
$agente_id_agente = $_POST['agente_id_agente'];
foreach ($resultado_select as $value) {
	echo "<p>$value</p>";
	$sql = "INSERT INTO `trabalha` ( `agente_id_agente` ,  `ciclo_id_ciclo` ,  `quadra_id_quadra` ,  `quadra_bairro_id_bairro`  ) VALUES(  '$agente_id_agente' ,  '{$_POST['ciclo_id_ciclo']}' ,  '$value' ,  '{$_POST['quadra_bairro_id_bairro']}'  ) "; 
	mysql_query($sql) or die(mysql_error()); 
}
//print_r($_POST['quadra_id_quadra']);
//mysql_query($sql) or die(mysql_error()); 
//header("LOCATION: trabalha_listar.php?msg_ok=Adicionado com sucesso!");
} 
?>