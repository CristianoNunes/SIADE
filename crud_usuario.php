<?php session_start(); 
    if(isset($_SESSION['auth'])){
	    include 'conecta.php';

	    if(isset($_POST['adicionar'])){
			$sql ="insert into Usuario(id, login, senha) values(".$_POST['id'].",'".$_POST['login']."','".$_POST['senha']."');";

			$result = mysql_query($sql) or die("Falha ao salvar: " . mysql_error());
	
			if(isset($result)){
				header("LOCATION:logado.php?msg='Usuario adicionado com sucesso!'");
	    	}
		}
	}else{
        session_destroy();
   	    header("LOCATION:index.php?msg=Sessão expirou...");
	}
?>