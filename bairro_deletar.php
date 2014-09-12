<? 
include('conecta.php'); 
$id_bairro = (int) $_GET['id_bairro']; 
mysql_query("DELETE FROM `bairro` WHERE `id_bairro` = '$id_bairro' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> ";
header("LOCATION: bairro_listar.php");
?> 