<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIADE</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">

                        <?php
                            if(isset($_GET['msg_ok'])){
                                echo "<div class='alert alert-success'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                                echo $_GET['msg_ok'];
                                echo "</div>";
                            }else if(isset($_GET['msg_erro'])){
                                echo "<div class='alert alert-danger'>
                                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>";
                                echo $_GET['msg_erro'];
                                echo "</div>";
                            }
                        ?>

                        <form role="form" action="processa_login.php" method="POST">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Usuário" name="login" type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Senha" name="senha" type="password" value="">
                                </div>
                                <input type="submit" class="btn btn-lg btn-success btn-block" name="enviar" value="Enviar" />
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
