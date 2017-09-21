<?php 
if (empty($_POST['usuario']) || empty($_POST['senha']) || empty($_POST['email'])){
	header('location:cadastrar_usuario.php?msg=empty');
}else{
	include '../conn.php';
	
	$senha 	 = $_POST['senha'];
	$usuario  = $_POST['usuario'];
	$email 	 = $_POST['email'];

	// criptografar senha:
	$segura = crypt($senha, '');

	$sql = "INSERT INTO usuario (USUARIO, EMAIL, SENHA)
	VALUES ('$usuario', '$email', '$segura')";

	mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if ($linhas > 0){		
		header('location:cadastrar_usuario.php?msg=success');
	}else{

		header('location:cadastrar_usuario.php?msg=error');
	}
}

 ?>