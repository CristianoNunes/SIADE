<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `quadra` ( `identificacao` ,  `bairro_id_bairro`  ) VALUES(  '{$_POST['identificacao']}' ,  '{$_POST['bairro_id_bairro']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
        header("LOCATION: quadra_listar.php?msg_ok=Adicionado com sucesso!"); 
} 
?>