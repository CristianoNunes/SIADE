<? 
include('conecta.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `imovel` WHERE `rua_id_rua` = '$id' ") ;
mysql_query("DELETE FROM `rua` WHERE `id_rua` = '$id' ") ;
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'rua_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'rua_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?>