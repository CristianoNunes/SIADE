<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `ciclo` ( `data_inicio` ,  `data_fim` ,  `numero` ,  `anoBase`  ) VALUES(  '{$_POST['data_inicio']}' ,  '{$_POST['data_fim']}' ,  '{$_POST['numero']}' ,  '{$_POST['anoBase']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
header("LOCATION: gerenciamentociclo_listar.php?msg_ok=Adicionado com sucesso!"); 
} 
?>