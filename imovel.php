<!DOCTYPE html>
<?php 
function __autoload($class_name){
    require_once $class_name.".php";
}
?>
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

    <script type="text/javascript">
        $(document).ready(function(){
            $('#bairros_id').change(function(){
                $('#quadras_id').load('ajax_buscar_quadras.php?bairro='+$('#bairros_id').val() );

            });
        });

    </script>

    <script type="text/javascript">
        function valida() {
            if(document.form.bairro_bairro_id_bairro.value == '') {
                document.form.bairro_bairro_id_bairro.focus();
                return false;
            }
            if(document.form.quadra_id_quadra.value == '') {
                document.form.quadra_id_quadra.focus();
                return false;
            }
            if(document.form.ladoquadra.value == '') {
                document.form.ladoquadra.focus();
                return false;
            }
            if(document.form.rua_id_rua.value == '') {
                document.form.rua_id_rua.focus();
                return false;
            }

        }
    </script>>

</head>

<body>
    <?php session_start(); 
    if(isset($_SESSION['auth'])){
        $obj = Conexao::getInstance();
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
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Configurações</a>
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
                            Cadastro de Imóvel
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form onsubmit="return valida()" name="form" role="form" action='imovel_adicionar.php' method='POST'>
                                        <div class="form-group">
                                            
                                            <p><b>Bairro:</b>
                                            <select class='form-control' name="quadra_bairro_id_bairro" id="bairros_id">    
                                                <?php
                                                $cidades2 = "SELECT id_bairro, nome_bairro FROM bairro ORDER BY nome_bairro";
                                                $rs2 = mysql_query($cidades2);
                                                echo("<option value='' selected></option>");
                                                while($linha = mysql_fetch_array($rs2,MYSQL_BOTH)) {
                                                    echo("<option value='".$linha['id_bairro']."'>".$linha['nome_bairro']."</option>");
                                                }
                                                ?>
                                            </select>
                                            
                                            <table width="310px">
                                            <tr><td>
                                            <p><b>Quadra:</b>
                                            <select class='form-control' name="quadra_id_quadra"   id="quadras_id" style="width: 120px">
                                            </select>
                                            
                                            </td><td>
                                            <p><b>Lado:</b>
                                            <input class="form-control" type='text' name='ladoquadra' style="width: 120px"/>
                                            </td></tr>
                                            </table>
                                            
                                            <p><b>Rua:</b>
                                            <select class='form-control' name="rua_id_rua">
                                            <?php
                                                $result = mysql_query("SELECT * FROM `rua`") or trigger_error(mysql_error()); 
                                                echo("<option value='' selected></option>");
                                                while($row = mysql_fetch_array($result)){ 
                                                foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
                                                echo "<option value='". $row['id_rua'] ."'> ". $row['descricao'] ." </option>";
                                                }
                                            ?>
                                            </select>
                                            
                                            <table width="310px">
                                            <tr><td>
                                            <p><b>Número:</b>
                                            <input class="form-control" type='text' name='numero_imovel' style="width: 120px"/>
                                            
                                            </td><td>
                                            <p><b>Tipo:</b>
                                            <select class='form-control' name="tipo_imovel_id_tipo_imovel" style="width: 120px">
                                            <?php
                                                $result = mysql_query("SELECT * FROM `tipo_imovel`") or trigger_error(mysql_error()); 
                                                while($row = mysql_fetch_array($result)){ 
                                                foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
                                                echo "<option value='". $row['id_tipo_imovel'] ."'> ". $row['sigla'] ." </option>";
                                                }
                                            ?>
                                            </select>
                                            </td></tr>
                                            </table>
                                            
                                            <table width="600px">
                                            <tr><td>
                                            <p><b>Nº de Habitantes:</b>
                                            <input class="form-control" type='text' name='quantidade_habitantes' style="width: 120px"/> 

                                            </td><td>
                                            <p><b>Nº de Cães:</b>
                                            <input class="form-control" type='text' name='quantidade_caes' style="width: 120px"/> 
                                            
                                            </td><td>
                                            <p><b>Nº de Gatos:</b>
                                            <input class="form-control" type='text' name='quantidade_gatos' style="width: 120px"/>
                                            </td></tr>
                                            </table>
                                        </div>
                                        <p><input type='submit' class='btn btn-default' value=' Salvar ' />
                                            <input type='hidden' value='1' name='submitted' />
                                            <input type='reset' class='btn btn-default' value=' Limpar ' /> 
                                    </form>
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
