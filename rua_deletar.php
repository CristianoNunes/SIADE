<? 
include('conecta.php'); 
$id_rua = (int) $_GET['id_rua']; 
mysql_query("DELETE FROM `rua` WHERE `id_rua` = '$id_rua' ") ; 
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'rua_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'rua_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?>