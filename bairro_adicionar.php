<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `bairros` ( `idcidade` ,  `nome_bairro`  ) VALUES(  '{$_POST['idcidade']}' ,  '{$_POST['nome_bairro']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
header("LOCATION: bairro_listar.php");
} 
?>