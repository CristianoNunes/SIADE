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
                            <a href="gerenciamentociclo.php"><i class="fa fa-dashboard fa-fw"></i> Gerenciamento de Ciclo</a>
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
                            Cadastro de Agente
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form onsubmit="return valida(this)" role="form" action='agente_adicionar.php' method='POST'>
                                        <div class="form-group">
                                            <p><b>Campanha:</b>
                                            <select class='form-control' name="campanha_id_campanha">
                                            <?php
                                                
                                                $result = mysql_query("SELECT * FROM `campanha`") or trigger_error(mysql_error()); 
                                                while($row = mysql_fetch_array($result)){ 
                                                foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
                                                echo "<option value='". $row['id_campanha'] ."'> ". $row['descricao'] ." </option>";
                                                }

                                            ?>
                                            </select>
                                            
                                            <p><b>Barra:</b>
                                            <input class='form-control' type='text' name='barra'/> 
                                            <p><b>Nome:</b>
                                            <input class='form-control' type='text' name='nome'/> 
                                            
                                            <table width="550px">
                                            <tr><td>
                                            <p><b>Telefone:</b>
                                            <input style="width: 130px" placeholder='XX XXXXXXXX' onblur='tel(this.form)' maxlength='11' class='form-control' type='text' name='telefone'/> 
                                            </td><td>
                                            <p><b>Celular:</b>
                                            <input style="width: 130px" placeholder='XX XXXXXXXX' onblur='cel(this.form)' maxlength='11' class='form-control' type='text' name='celular'/> 
                                            </td></tr>
                                            </table>

                                            <p><b>Login:</b>
                                            <input class='form-control' type='text' name='login'/> 
                                            <p><b>Senha:</b>
                                            <input class='form-control' type='password' name='senha'/>
                                            <p><b>Nivel:</b>
                                            <select class='form-control' name="nivel_id_nivel">
                                            <?php
                                                include('conecta.php');
                                                $result = mysql_query("SELECT * FROM `nivel`") or trigger_error(mysql_error()); 
                                                while($row = mysql_fetch_array($result)){ 
                                                foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
                                                echo "<option value='". $row['id_nivel'] ."'> ".  $row['descricao'] ." </option>";
                                                }

                                            ?>
                                            </select>

                                        <p><input type='submit' class='btn btn-default' value=' Salvar ' />
                                        <input type='hidden' value='1' name='submitted' />
                                        <input type='reset' class='btn btn-default' value=' Limpar ' /></p> 
                                        </div>

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
    <script src="js/valida.js"></script>

</body>

</html>