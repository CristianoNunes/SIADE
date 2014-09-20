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
            <!-- /.navbar-static-side -->
        </nav>


    </div>
    <!-- /#wrapper -->
    <div id="page-wrapper">
    	<br />
        <div class="row">
        	<div class="panel panel-default">
        		<div class="panel panel-heading">
        			Editar Agente
        		</div>
                <div class="panel-body">
                    <form onsubmit="return valida(this)" role="form" method='POST'>
                        <div class="form-group">
                            <?php 
                                include('conecta.php'); 
                                if (isset($_GET['id']) ) {
                                    $id = $_GET['id'];
                                    if (isset($_POST['submitted'])) { 
                                        foreach($_POST AS $key => $value) { 
                                            $_POST[$key] = mysql_real_escape_string($value); 
                                        } 
                                        $sql = "UPDATE agente as a
                                        inner join nivel as n on a.nivel_id_nivel = n.id_nivel
                                        SET  `barra` =  '{$_POST['barra']}' ,  
                                            `nome` =  '{$_POST['nome']}' ,  
                                            `telefone` =  '{$_POST['telefone']}' ,  
                                            `celular` =  '{$_POST['celular']}' ,  
                                            `login` =  '{$_POST['login']}' ,  
                                            `senha` =  '{$_POST['senha']}' ,  
                                            `nivel_id_nivel` =  '{$_POST['id_nivel']}'   
                                        WHERE `id_agente` = '$id' "; 
                                        mysql_query($sql) or die(mysql_error()); 
                                        echo (mysql_affected_rows()) ?  
                                        "<script type='text/javascript'>
                                            window.location.href = 'agente_listar.php?msg_ok=Alteração salva com sucesso!'
                                        </script>" 
                                        : 
                                        "<script type='text/javascript'>
                                            window.location.href = 'agente_listar.php?msg_erro=Nenhuma alteração realizada!'
                                        </script>";
                                    } 

                                    $row = mysql_fetch_array ( mysql_query("SELECT * FROM agente
                                    WHERE `id_agente` = '$id' ")); 
                            ?>
         
                            <p><b>Barra:</b>
                            <input class='form-control' type='text' name='barra' value='<?= stripslashes($row['barra']) ?>' /> 
                            <p><b>Nome:</b>
                            <input class='form-control' type='text' name='nome' value='<?= stripslashes($row['nome']) ?>' /> 
                            <p><b>Telefone:</b>
                            <input placeholder='XX XXXXXXXX' onblur='tel(this.form)' maxlength='11' class='form-control' type='text' name='telefone' value='<?= stripslashes($row['telefone']) ?>' /> 
                            <p><b>Celular:</b>
                            <input placeholder='XX XXXXXXXX' onblur='cel(this.form)' maxlength='11' class='form-control' type='text' name='celular' value='<?= stripslashes($row['celular']) ?>' />
                            <p><b>Login:</b>
                            <input class='form-control' type='text' name='login' value='<?= stripslashes($row['login']) ?>' /> 
                            <p><b>Senha:</b>
                            <input class='form-control' type='password' name='senha' value='<?= stripslashes($row['senha']) ?>' /> 
                            <p><b>Nivel:</b>
                            <select name='id_nivel' class='form-control'>
                                <?
                                    $result = mysql_query("SELECT * FROM nivel") 
                                    or trigger_error(mysql_error()); 
                                    while($row = mysql_fetch_array($result)){ 
                                        foreach($row AS $key => $value) { $row[$key] = stripslashes($value); }
                                        echo "<option value='". stripslashes($row['id_nivel']) ."'> ". $row['descricao'] ." </option>";
                                    }
                                ?>
                            </select>

                            <p><input type='submit' class='btn btn-default' value=' Salvar ' /><input type='hidden' value='1' name='submitted' />
                            <a href='agente_listar.php' class='btn btn-default'> Voltar </a> 
                        </div>
                    </form> 
                    <?php } ?> 
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
    <script src="js/valida.js"></script>
</body>

</html>
