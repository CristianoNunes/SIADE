<? 
include('conecta.php'); 
$id_quadra = (int) $_GET['id_quadra']; 
mysql_query("DELETE FROM `quadra` WHERE `id_quadra` = '$id_quadra' ") ; 
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'quadra_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'quadra_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?>

