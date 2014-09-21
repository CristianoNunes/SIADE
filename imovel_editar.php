<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sistema Informatizado dos Agentes de Endemias</title>

    <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
    
    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Dashboard -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">
    <link href="css/plugins/timeline/timeline.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>
    <?php session_start(); 
    if(isset($_SESSION['auth'])){
        include 'conecta.php';
    }else{
        session_destroy();
        header("LOCATION:index.php?msg_erro=Acesso negado!");
    }
  ?>
    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="principal.php">SIADE</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown Menu de Configurações -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
                        </li>
                        <li><a href="configuracoes.php"><i class="fa fa-gear fa-fw"></i> Configurações</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Sair</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div id="menu" class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><i class="fa fa-edit fa-fw"></i> Cadastros<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="agente_listar.php">Agente</a>
                                </li>
                                <li>
                                    <a href="bairro_listar.php">Bairro</a>
                                </li>
                                <li>
                                    <a href="quadra_listar.php">Quadra</a>
                                </li>
                                <li>
                                    <a href="imovel_listar.php">Imóvel</a>
                                </li>
                                <li>
                                    <a href="rua_listar.php">Rua</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="gerenciamentociclo_listar.php"><i class="fa fa-dashboard fa-fw"></i> Gerenciamento de Ciclo</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Relatórios<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="d1.php">D1</a>
                                </li>
                                <li>
                                    <a href="d7.php">D7</a>
                                </li>
                                <li>
                                    <a href="ciclo.php">Ciclo</a>
                                </li>
                                <li>
                                    <a href="#">Pendentes <span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <li>
                                            <a href="pendentedia.php">Dia</a>
                                        </li>
                                        <li>
                                            <a href="pendentesemana.php">Semana</a>
                                        </li>
                                        <li>
                                            <a href="pendenteciclo.php">Ciclo</a>
                                        </li>
                                    </ul>
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>


    </div>
    <!-- /#wrapper -->
    <div id="page-wrapper">
    <br />
    <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Editar Imóvel
                     </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-6">
        <? 
            include('conecta.php'); 
            if (isset($_GET['id_imovel']) ) { 
            $id_imovel = (int) $_GET['id_imovel']; 
            if (isset($_POST['submitted'])) { 
            foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
            $sql = "UPDATE `imovel` SET  `quantidade_habitantes` =  '{$_POST['quantidade_habitantes']}' ,  `quantidade_caes` =  '{$_POST['quantidade_caes']}' ,  `quantidade_gatos` =  '{$_POST['quantidade_gatos']}' ,  `numero_imovel` =  '{$_POST['numero_imovel']}' ,  `ladoquadra` =  '{$_POST['ladoquadra']}' ,  `quadra_id_quadra` =  '{$_POST['quadra_id_quadra']}' ,  `quadra_bairro_id_bairro` =  '{$_POST['quadra_bairro_id_bairro']}' ,  `rua_id_rua` =  '{$_POST['rua_id_rua']}' ,  `tipo_imovel_id_tipo_imovel` =  '{$_POST['tipo_imovel_id_tipo_imovel']}'   WHERE `id_imovel` = '$id_imovel' "; 
            mysql_query($sql) or die(mysql_error()); 
            echo (mysql_affected_rows()) ? "Edited row.<br />" : "Nothing changed. <br />"; 
            echo "<a href='imovel_listar.php'>Back To Listing</a>"; 
            } 
            $row = mysql_fetch_array ( mysql_query("SELECT * FROM `imovel` WHERE `id_imovel` = '$id_imovel' ")); 
            ?>

            <form action='' method='POST'>
            <p><b>Bairro:</b>
            <input class="form-control" type='text' name='quadra_bairro_id_bairro' value='<?= stripslashes($row['quadra_bairro_id_bairro']) ?>' />
            
            <table width="310">
            <tr><td>
            <p><b>Quadra:</b>
            <input style="width: 120px" class="form-control" type='text' name='quadra_id_quadra' value='<?= stripslashes($row['quadra_id_quadra']) ?>' /> 
            
            </td><td>
            <p><b>Lado:</b>
            <input style="width: 120px" class="form-control" type='text' name='ladoquadra' value='<?= stripslashes($row['ladoquadra']) ?>' />
            </td></tr>
            </table>

            <p><b>Rua:</b>
            <input class="form-control" type='text' name='rua_id_rua' value='<?= stripslashes($row['rua_id_rua']) ?>' /> 
            
            <table width="310px">
            <tr><td>
            <p><b>Número:</b>
            <input style="width: 120px" class="form-control" type='text' name='numero_imovel' value='<?= stripslashes($row['numero_imovel']) ?>' />
            </td><td>

            <p><b>Tipo:</b>
            <input style="width: 120px" class="form-control" type='text' name='tipo_imovel_id_tipo_imovel' value='<?= stripslashes($row['tipo_imovel_id_tipo_imovel']) ?>' />    
            </td></tr>
            </table>

            <table width="600px">
            <tr><td>
            <p><b>Nº de Habitantes:</b>
            <input style="width: 120px" class="form-control" type='text' name='quantidade_habitantes' value='<?= stripslashes($row['quantidade_habitantes']) ?>' /> 
            
            </td><td>
            <p><b>Nº de Cães:</b>
            <input style="width: 120px" class="form-control" type='text' name='quantidade_caes' value='<?= stripslashes($row['quantidade_caes']) ?>' /> 
            
            </td><td>
            <p><b>Nº de Gatos:</b>
            <input style="width: 120px" class="form-control" type='text' name='quantidade_gatos' value='<?= stripslashes($row['quantidade_gatos']) ?>' /> 
            </td></tr>
            </table>

            <p><input type='submit' class='btn btn-default' value='Editar' />
            <input type='hidden' value='1' name='submitted' /> 
            <a href='imovel_listar.php' class='btn btn-default'> Voltar </a>
            </form> 
            <? } ?>
            </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Dashboard -->
    <script src="js/plugins/morris/raphael-2.1.0.min.js"></script>
    <script src="js/plugins/morris/morris.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Dashboard - Use for reference -->
    <script src="js/demo/dashboard-demo.js"></script>
    
</body>

</html>