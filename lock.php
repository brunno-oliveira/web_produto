<?php session_start();
if(empty($_SESSION['usuario']) || empty($_SESSION['senha'])){	
	header('location:../usuario/login.php?msg=errorLogin');
}
?>