<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `bairro` ( `nome_bairro` ,  `cidade_id_cidade`  ) VALUES(  '{$_POST['nome_bairro']}' ,  '{$_POST['cidade_id_cidade']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
        header("LOCATION: bairro_listar.php?msg_ok=Adicionado com sucesso!"); 
} 
?>