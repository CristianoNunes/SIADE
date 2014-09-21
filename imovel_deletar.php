<? 
include('conecta.php'); 
$id_imovel = (int) $_GET['id_imovel'];
mysql_query("DELETE FROM `visita` WHERE `imovel_id_imovel` = '$id_imovel' ") ;
mysql_query("DELETE FROM `imovel` WHERE `id_imovel` = '$id_imovel' ") ;
echo (mysql_affected_rows()) ? 
        "<script type='text/javascript'>
            window.location.href = 'imovel_listar.php?msg_ok=Excluído com sucesso!'
        </script>" 
        : 
        "<script type='text/javascript'>
            window.location.href = 'imovel_listar.php?msg_erro=Erro ao excluir!'
        </script>"; 
?>