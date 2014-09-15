<? 
	include('conecta.php'); 
	$id = (int) $_GET['id']; 
	mysql_query("DELETE FROM `imovel` WHERE `id` = '$id' ") ; 
	echo (mysql_affected_rows()) ?  
		"<script type='text/javascript'>
            window.location.href = 'imovel_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'imovel_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?> 