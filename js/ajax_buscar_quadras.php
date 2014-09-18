<?php
include("conecta.php");
$id_bairro = $_GET['bairro'];
$result = mysql_query("SELECT id_quadra, identificacao FROM quadra WHERE bairro_id_bairro = ".$id_bairro." ORDER BY identificacao");
while($row = mysql_fetch_array($result) ){
	echo "<option value='".$row['id_quadra']."'>".$row['identificacao']."</option>";
}

?>