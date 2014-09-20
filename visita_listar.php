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
                        <li><a href="configuracoes.html"><i class="fa fa-gear fa-fw"></i> Configurações</a>
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
    <!--conteudocentral -->
    <div id="page-wrapper">
            <br />
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Relatório Diário - D1
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <?php
                                            
                                            $data = $_POST['data'];
                                            $agente = $_POST['agente_id_agente'];
                                            
                                                include('conecta.php'); 
                                                echo "<table class='table table-striped table-hover'>"; 
                                                echo "<tr>";
                                                echo "<td><b>Ciclo</b></td>";
                                                echo "<td><b>Semana</b></td>";
                                                echo "<td><b>Data</b></td>";
                                                echo "<td><b>Hora</b></td>";
                                                echo "<td><b>Agente</b></td>";
                                                echo "<td><b>Pendencia</b></td>";
                                                echo "<td><b>Tipo Visita</b></td>"; 
                                                echo "<td><b>Nº Imovel</b></td>"; 
                                                echo "<td><b>Eliminados</b></td>"; 
                                                echo "<td><b>Tratado</b></td>"; 
                                                echo "<td><b>Remedio (grama)</b></td>"; 
                                                echo "<td><b>Quantidade Tratado</b></td>"; 
                                                echo "</tr>"; 
                                                $result = mysql_query("SELECT * FROM `visita` as v    
                                                 inner join agente as a on v.agente_id_agente = a.id_agente
                                                 inner join imovel as i on v.imovel_id_imovel = i.id_imovel
                                                 inner join ciclo as c on v.ciclo_id_ciclo = c.id_ciclo
                                                 WHERE data='$data' AND agente_id_agente=$agente
                                                    ") or trigger_error(mysql_error()); 
                                                while($row = mysql_fetch_array($result)){ 
                                                foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
                                                echo "<tr>";
                                                echo "<td valign='top'>" . nl2br( $row['numero']) . "</td>";
                                                echo "<td valign='top'>" . nl2br( $row['semana']) . "</td>";
                                                echo "<td valign='top'>" . nl2br( $row['data']) . "</td>";
                                                echo "<td valign='top'>" . nl2br( $row['hora']) . "</td>";
                                                echo "<td valign='top'>" . nl2br( $row['nome']) . "</td>";
                                                echo "<td valign='top'>" . nl2br( $row['pendencia']) . "</td>";  
                                                echo "<td valign='top'>" . nl2br( $row['tipo_visita']) . "</td>";  
                                                echo "<td valign='top'>" . nl2br( $row['numero_imovel']) . "</td>";  
                                                echo "<td valign='top'>" . nl2br( $row['eliminados']) . "</td>";  
                                                echo "<td valign='top'>" . nl2br( $row['tratado']) . "</td>";  
                                                echo "<td valign='top'>" . nl2br( $row['remedio']) . "</td>";  
                                                echo "<td valign='top'>" . nl2br( $row['quantidade_tratado']) . "</td>";  
                                                
                                                echo "</tr>"; 
                                                } 
                                                echo "</table>";
                                                ?>
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
        <!-- /conteudocentral -->

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