<? 
include('conecta.php'); 
$id_quadra = (int) $_GET['id_quadra']; 
mysql_query("DELETE FROM `quadra` WHERE `id_quadra` = '$id_quadra' ") ; 
echo (mysql_affected_rows()) ? "Row deleted.<br /> " : "Nothing deleted.<br /> "; 
header("LOCATION: quadra_listar.php");
?>

