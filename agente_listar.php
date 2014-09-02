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
                                    <a href="bairro.php">Bairro</a>
                                </li>
                                <li>
                                    <a href="quadra.php">Quadra</a>
                                </li>
                                <li>
                                    <a href="imovel.php">Imóvel</a>
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
                                    <a href="pendentes.php">Pendentes</a>
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
        <div class="row">
        <div class="panel panel-default">
            <div class="panel panel-heading">
                Lista de Agentes
            </div>
            <div class="panel-body">
                <div class="table-responsive">
        <?php 
            include('conecta.php'); 
            echo "<table class='table table-striped'>"; 
            echo "<tr>"; 
            echo "<td><b>Campanha</b></td>"; 
            echo "<td><b>Barra</b></td>"; 
            echo "<td><b>Nome</b></td>"; 
            echo "<td><b>Telefone</b></td>"; 
            echo "<td><b>Celular</b></td>"; 
            echo "<td><b>Login</b></td>"; 
            echo "<td><b>Nivel</b></td>"; 
            echo "<td></td>"; 
            echo "<td></td>";
            echo "</tr>"; 
            $result = mysql_query("SELECT * FROM `agentes`") or trigger_error(mysql_error()); 
            while($row = mysql_fetch_array($result)){ 
            foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
            echo "<tr>";  
              
            echo "<td valign='top'>" . nl2br( $row['Campanha_idCampanha']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['barra']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['nome']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['telefone']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['celular']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['login']) . "</td>";  
            echo "<td valign='top'>" . nl2br( $row['Nivel_IdNivel']) . "</td>";  
            echo "<td valign='top'><a class='btn btn-warning' href=agente_editar.php?id={$row['id']}>Editar</a></td><td><a class='btn btn-danger' href=agente_deletar.php?id={$row['id']}>Excluir</a></td> "; 
            echo "</tr>"; 
            } 
            echo "</table>"; 
        ?>
        <a href="agente.php" class="btn btn-success">Adicionar</a>
                    </div>
                </div>
            </div>
        </div>
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