<?php 
	if(empty($_POST['id']) || empty($_POST['nome']) || empty($_POST['marca']) ||
		empty($_POST['valor']) || empty($_POST['qtde'])){
		header('location:gerenciar.php?msg=error3');
	} else {
			include '../conn.php';
			$id 	 = $_POST['id'];
			$nome  = $_POST['nome'];
			$marca = $_POST['marca'];
			$valor = $_POST['valor'];
			$qtde  = $_POST['qtde'];
			
			$sql = "UPDATE produto SET NOME = '$nome', MARCA = '$marca', VALOR = $valor, QUANTIDADE = $qtde WHERE ID = $id";

			mysqli_query($conn, $sql);		
			$linhas = mysqli_affected_rows($conn);			
			if($linhas > 0){			
				header('location:gerenciar.php?msg=success2');
			}else{			
				header('location:gerenciar.php?msg=error4');
		}			
	}
 ?>