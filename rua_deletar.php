<? 
include('conecta.php'); 
$id_rua = (int) $_GET['id_rua']; 
mysql_query("DELETE FROM `rua` WHERE `id_rua` = '$id_rua' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
header("LOCATION: rua_listar.php");
?>