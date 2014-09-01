<?php 
	include('conecta.php'); 
    if (isset($_POST['submitted'])) { 
    	foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
        $sql = "INSERT INTO `agentes` ( `Campanha_idCampanha` ,  `barra` ,  `nome` ,  `telefone` ,  `celular` ,  `sexo` ,  
        	`login` ,  `senha` ,  `Nivel_IdNivel`  ) VALUES(  '{$_POST['Campanha_idCampanha']}' ,  '{$_POST['barra']}' ,  
        	'{$_POST['nome']}' ,  '{$_POST['telefone']}' ,  '{$_POST['celular']}' ,  '{$_POST['sexo']}' ,  
        	'{$_POST['login']}' ,  '{$_POST['senha']}' ,  '{$_POST['Nivel_IdNivel']}'  ) "; 
        mysql_query($sql) or die(mysql_error()); 
        header("LOCATION: agente_listar.php"); 
    } 
?>