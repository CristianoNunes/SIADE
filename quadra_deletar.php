<? 
include('conecta.php'); 
$id = (int) $_GET['id']; 
mysql_query("DELETE FROM `quadra` WHERE `id_quadra` = '$id' ") ; 
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'quadra_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'quadra_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?>

