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
    	<div class="panel panel-default">
    		<div class="panel panel-heading">
    			Editar
    		</div>
            <?php 
                include('conecta.php'); 
                if (isset($_GET['id']) ) { 
                $id = (int) $_GET['id']; 
                if (isset($_POST['submitted'])) { 
                foreach($_POST AS $key => $value) { $_POST[$key] = mysql_real_escape_string($value); } 
                $sql = "UPDATE `agentes` SET  `Campanha_idCampanha` =  '{$_POST['Campanha_idCampanha']}' ,  `barra` =  '{$_POST['barra']}' ,  `nome` =  '{$_POST['nome']}' ,  `telefone` =  '{$_POST['telefone']}' ,  `celular` =  '{$_POST['celular']}' ,  `sexo` =  '{$_POST['sexo']}' ,  `login` =  '{$_POST['login']}' ,  `senha` =  '{$_POST['senha']}' ,  `Nivel_IdNivel` =  '{$_POST['Nivel_IdNivel']}'   WHERE `id` = '$id' "; 
                mysql_query($sql) or die(mysql_error()); 
                echo (mysql_affected_rows()) ? "Alteração Salva com Sucesso.<br />" : "Erro ao salvar. <br />"; 
                echo "<a href='agente_listar.php'>Voltar para Lista</a>"; 
                } 
                $row = mysql_fetch_array ( mysql_query("SELECT * FROM `agentes` WHERE `id` = '$id' ")); 
                ?>

                <form action='' method='POST'> 
                <p><b>Campanha IdCampanha:</b><br /><input type='text' name='Campanha_idCampanha' value='<?= stripslashes($row['Campanha_idCampanha']) ?>' /> 
                <p><b>Barra:</b><br /><input type='text' name='barra' value='<?= stripslashes($row['barra']) ?>' /> 
                <p><b>Nome:</b><br /><input type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> 
                <p><b>Telefone:</b><br /><input type='text' name='telefone' value='<?= stripslashes($row['telefone']) ?>' /> 
                <p><b>Celular:</b><br /><input type='text' name='celular' value='<?= stripslashes($row['celular']) ?>' /> 
                <p><b>Sexo:</b><br /><input type='radio' name='sexo' value='masculino'/> Masculino <input type='radio' name='sexo' value='feminino'/> Feminino
                <p><b>Login:</b><br /><input type='text' name='login' value='<?= stripslashes($row['login']) ?>' /> 
                <p><b>Senha:</b><br /><input type='text' name='senha' value='<?= stripslashes($row['senha']) ?>' /> 
                <p><b>Nivel IdNivel:</b><br /><input type='text' name='Nivel_IdNivel' value='<?= stripslashes($row['Nivel_IdNivel']) ?>' /> 
                <p><input type='submit' class="btn btn-success" value='Salvar' /><input type='hidden' value='1' name='submitted' /> 
                </form> 
                <?php } ?> 
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
