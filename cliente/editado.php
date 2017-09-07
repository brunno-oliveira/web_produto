<?php 
	if(empty($_POST['id']) || empty($_POST['nome']) || empty($_POST['email']) ||
		empty($_POST['cpf'])){
		header('location:gerenciar.php?msg=error3');
	} else {
			include '../conn.php';
			$id 	 = $_POST['id'];
			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			$cpf = $_POST['cpf'];			
			
			$sql = "UPDATE cliente SET NOME = '$nome', EMAIL = '$email', CPF = '$cpf' WHERE ID = $id";

			mysqli_query($conn, $sql);		
			$linhas = mysqli_affected_rows($conn);			
			if($linhas > 0){			
				header('location:gerenciar.php?msg=success2');
			}else{			
				header('location:gerenciar.php?msg=error4');
		}			
	}
 ?>