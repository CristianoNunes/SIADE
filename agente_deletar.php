<? 
include('conecta.php'); 
$id_agente = (int) $_GET['id']; 
mysql_query("DELETE FROM `agente` WHERE `id_agente` = '$id_agente' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
header("LOCATION: agente_listar.php");
?>