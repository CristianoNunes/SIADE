<? 
include('conecta.php'); 
$id_ciclo = (int) $_GET['id_ciclo'];
mysql_query("DELETE FROM `trabalha` WHERE `ciclo_id_ciclo` = '$id_ciclo' ") ;
mysql_query("DELETE FROM `visita` WHERE `ciclo_id_ciclo` = '$id_ciclo' ") ;
mysql_query("DELETE FROM `ciclo` WHERE `id_ciclo` = '$id_ciclo' ") ; 
echo (mysql_affected_rows()) ? 
		"<script type='text/javascript'>
            window.location.href = 'gerenciamentociclo_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'gerenciamentociclo_listar.php?msg_erro=Erro ao excluir!'
        </script>";
?>