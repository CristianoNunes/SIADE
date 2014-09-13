<? 
include('conecta.php'); 
$id_bairro = (int) $_GET['id_bairro']; 
mysql_query("DELETE FROM `bairro` WHERE `id_bairro` = '$id_bairro' ") ; 
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'bairro_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'bairro_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?> 