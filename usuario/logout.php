<?php session_start();
unset($_SESSION['usuario']);
unset($_SESSION['senha']);
session_destroy();
header('location:../usuario/login.php');
?>