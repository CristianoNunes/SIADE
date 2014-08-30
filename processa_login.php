<?php 
    include 'conecta.php';

    if(isset($_POST['login']) && isset($_POST['senha'])){
        $log = $_POST['login'];
        $pas = $_POST['senha'];

        $logado = false;
        $resultset = mysql_query("select * from Agente where username = '$log' and password = '$pas';");

        while($row = mysql_fetch_array($resultset, MYSQL_BOTH)){
             $logado = true;
        }
    }

    if($logado){
        session_start();
        $_SESSION['auth'] = true;
        header("LOCATION: principal.php?msg=Logado!");
    }else{
        header("LOCATION: index.php?msg=Falha no login, tente novamente!");
    }
?>