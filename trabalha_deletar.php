<? 
include('conecta.php'); 
$id_trabalha = (int) $_GET['id_trabalha']; 
mysql_query("DELETE FROM `trabalha` WHERE `id_trabalha` = '$id_trabalha' ") ; 
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'trabalha_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'trabalha_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?>