<?php
class Conexao{
	private static $_instance;
    
    private $connect;
    private $db;
    
    private function __construct() { 
    	$host = "localhost";
	    $usuario = "root";
	    $senha = "";
	    $dbname = "mydb";
    	$this->connect = mysql_connect($host, $usuario, $senha) or die("Banco de dados não conectado: " .mysql_error());
    	$this->db = mysql_select_db($dbname, $this->connect) or die("Erro ao selecionar DB"); 
        }
	// Evita que a classe seja clonada
    private function __clone() { }
	public static function getInstance(){
		if (!isset(self::$_instance)) { // Testa se há instância definida na propriedade, caso sim, a classe não será instanciada novamente.
			self::$_instance = new self; // o new self cria uma instância da própria classe à própria classe.
		}
		return self::$_instance;
	}


/*
	Para usar uma conexao use as seguintes linhas:

	No inicio do arquivo:
	funnction __autoload($class_name){
		require_once $class_name.'php';
	}

	na hora de usar a conexao:
	$variavel_conexao = Conexao::getInstance()->db;
*/

}