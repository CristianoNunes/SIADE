<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `imovel` ( `quantidade_habitantes` ,  `quantidade_caes` ,  `quantidade_gatos` ,  `numero_imovel` ,  `ladoquadra` ,  `quadra_id_quadra` ,  `quadra_bairro_id_bairro` ,  `rua_id_rua` ,  `tipo_imovel_id_tipo_imovel`  ) 
VALUES(  '{$_POST['quantidade_habitantes']}' ,  '{$_POST['quantidade_caes']}' ,  '{$_POST['quantidade_gatos']}' ,  '{$_POST['numero_imovel']}' ,  '{$_POST['ladoquadra']}' ,  '{$_POST['quadra_id_quadra']}' ,  '{$_POST['quadra_bairro_id_bairro']}' ,  '{$_POST['rua_id_rua']}' ,  '{$_POST['tipo_imovel_id_tipo_imovel']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
header("LOCATION: imovel_listar.php?msg_ok=Adicionado com sucesso!"); 
} 
?>