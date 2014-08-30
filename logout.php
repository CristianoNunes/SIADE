<?php
session_start();
if(isset($_SESSION['auth'])){
	session_unset();	
	session_destroy();
	header("LOCATION:index.php");
}
?>