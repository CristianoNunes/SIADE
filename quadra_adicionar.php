<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `quadras` ( `idQuadra` ,  `identificacao` ,  `idBairro`  ) VALUES(  '{$_POST['idQuadra']}' ,  '{$_POST['identificacao']}' ,  '{$_POST['idBairro']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
header("LOCATION: quadra_listar.php");  
} 
?>