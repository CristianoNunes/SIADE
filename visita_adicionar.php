<? 
include('conecta.php'); 
if (isset($_POST['submitted'])) { 
foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
$sql = "INSERT INTO `visita` ( `hora` ,  `pendencia` ,  `data` ,  `tipo_visita` ,  `imovel_id_imovel` ,  `agente_id_agente` ,  `ciclo_id_ciclo` ,  `semana` ,  `eliminados` ,  `tratado` ,  `remedio` ,  `quantidade_tratado`  ) VALUES(  '{$_POST['hora']}' ,  '{$_POST['pendencia']}' ,  '{$_POST['data']}' ,  '{$_POST['tipo_visita']}' ,  '{$_POST['imovel_id_imovel']}' ,  '{$_POST['agente_id_agente']}' ,  '{$_POST['ciclo_id_ciclo']}' ,  '{$_POST['semana']}' ,  '{$_POST['eliminados']}' ,  '{$_POST['tratado']}' ,  '{$_POST['remedio']}' ,  '{$_POST['quantidade_tratado']}'  ) "; 
mysql_query($sql) or die(mysql_error()); 
echo "Added row.<br />"; 
echo "<a href='visita_listar.php'>Back To Listing</a>"; 
} 
?>

<form action='' method='POST'> 
<p><b>Hora:</b><br /><input type='text' name='hora'/> 
<p><b>Pendencia:</b><br /><input type='text' name='pendencia'/> 
<p><b>Data:</b><br /><input type='text' name='data'/> 
<p><b>Tipo Visita:</b><br /><input type='text' name='tipo_visita'/> 
<p><b>Imovel Id Imovel:</b><br /><input type='text' name='imovel_id_imovel'/> 
<p><b>Agente Id Agente:</b><br /><input type='text' name='agente_id_agente'/> 
<p><b>Ciclo Id Ciclo:</b><br /><input type='text' name='ciclo_id_ciclo'/> 
<p><b>Semana:</b><br /><input type='text' name='semana'/> 
<p><b>Eliminados:</b><br /><input type='text' name='eliminados'/> 
<p><b>Tratado:</b><br /><input type='text' name='tratado'/> 
<p><b>Remedio:</b><br /><input type='text' name='remedio'/> 
<p><b>Quantidade Tratado:</b><br /><input type='text' name='quantidade_tratado'/> 
<p><input type='submit' value='Add Row' /><input type='hidden' value='1' name='submitted' /> 
</form>