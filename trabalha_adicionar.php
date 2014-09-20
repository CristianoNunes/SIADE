<? 
include('conecta.php');

if (isset($_POST['submitted'])) { 
	$ciclo = $_POST['id_ciclo'];
	$resultado_select = $_POST['quadra_id_quadra'];
	print_r($resultado_select);
	$agente_id_agente = $_POST['agente_id_agente'];
	$ciclo_id_ciclo = $_POST['ciclo_id_ciclo'];
	$quadra_bairro_id_bairro = $_POST['quadra_bairro_id_bairro'];
	foreach ($resultado_select as $value) {
		$sql = "INSERT INTO `trabalha` ( `agente_id_agente` ,  `ciclo_id_ciclo` ,  `quadra_id_quadra` ,  `quadra_bairro_id_bairro`  ) VALUES(  '$agente_id_agente' ,  '$ciclo_id_ciclo' ,  '$value' ,  '$quadra_bairro_id_bairro'  ) "; 
		mysql_query($sql) or die(mysql_error()); 
	}
	header("LOCATION: trabalha_listar.php?id_ciclo=$ciclo&msg_ok=Adicionado com sucesso!");
} 
?>