<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `agente` ( `barra` ,  `nome` ,  `telefone` ,  `celular` ,  `sexo` ,  `login` ,  `senha` ,  `nivel_id_nivel` ,  `campanha_id_campanha`  ) VALUES(  '{$_POST['barra']}' ,  '{$_POST['nome']}' ,  '{$_POST['telefone']}' ,  '{$_POST['celular']}' ,  '{$_POST['sexo']}' ,  '{$_POST['login']}' ,  '{$_POST['senha']}' ,  '{$_POST['nivel_id_nivel']}' ,  '{$_POST['campanha_id_campanha']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
header("LOCATION: agente_listar.php"); 
} 
?>