<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `quadras` (`identificacao` ,  `Agente_id` ,  `Bairro_id`  ) VALUES( '{$_POST['identificacao']}' ,  '{$_POST['Agente_id']}' ,  '{$_POST['Bairro_id']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
header("LOCATION: quadra_listar.php"); 
} 
?>