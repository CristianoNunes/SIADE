<?php 
    $host = "localhost";
    $usuario = "root";
    $senha = "";
    $dbname = "mydb";
    $connect = mysql_connect($host, $usuario, $senha) or die("Banco de dados não conectado: " .mysql_error());
    $db = mysql_select_db($dbname, $connect) or die("Erro ao selecionar DB"); 
?>