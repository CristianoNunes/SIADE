<? 
include('conecta.php');
$ciclo = (int) $_GET['id_ciclo'];
$id_trabalha = (int) $_GET['id_trabalha']; 
mysql_query("DELETE FROM `trabalha` WHERE `id_trabalha` = '$id_trabalha' ") ;
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'trabalha_listar.php?id_ciclo=$ciclo&msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'trabalha_listar.php?id_ciclo=$ciclo&msg_erro=Erro ao excluir!'
        </script>"; 
?>