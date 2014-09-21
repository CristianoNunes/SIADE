<? 
include('conecta.php'); 
$id = (int) $_GET['id'];
mysql_query("DELETE FROM `quadra` WHERE `bairro_id_bairro` = '$id' ") ;
mysql_query("DELETE FROM `bairro` WHERE `id_bairro` = '$id' ") ;
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'bairro_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'bairro_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?> 