<?php 	
	if(empty($_POST['id']) || empty($_POST['quantidade']) 
	|| empty($_POST['valor'])){
		header('location:gerenciar.php?msg=error3');
	} else {
			include '../conn.php';
			$id 	 = $_POST['id'];
			$qtde  = $_POST['quantidade'];	
			$valor  = $_POST['valor'];
			
			$sql = "UPDATE venda SET QTDE = '$qtde', VALOR = '$valor', TOTAL = ($qtde * $valor) WHERE ID = $id;";

			mysqli_query($conn, $sql);		
			$linhas = mysqli_affected_rows($conn);			
			if($linhas > 0){			
				header('location:gerenciar.php?msg=success2');
			}else{										
				header('location:gerenciar.php?msg=error4');
		}			
	}
 ?>