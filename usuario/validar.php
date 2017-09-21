<?php 
if(empty($_POST['usuario']) || empty($_POST['senha'])){
	header('location:login.php?msg=empty');
}else{
	include '../conn.php';

	$usuario    = $_POST['usuario'];
	$senha	 = $_POST['senha'];

	$sql = "SELECT ID, SENHA, EMAIl, USUARIO FROM usuario WHERE USUARIO LIKE '$usuario'";	
	$result = mysqli_query($conn, $sql);

	$linhas = mysqli_affected_rows($conn);

	if($linhas > 0){
		$registro = mysqli_fetch_assoc($result);

		if(crypt($senha, $registro['SENHA']) == $registro['SENHA']){
			session_start();
			$_SESSION['id'] 	 = $registro['ID'];
			$_SESSION['email'] = $registro['EMAIL'];
			$_SESSION['senha'] = $registro['SENHA'];
			$_SESSION['usuario'] = $registro['USUARIO'];			
			header('location:../index.php');
		}else{
			header('location:login.php?msg=invalid');
		}
	}else{
		header('location:login.php?msg=invalid');
	}
}
?>