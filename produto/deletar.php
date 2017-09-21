<?php		
	if(isset($_GET['id'])){
		include '../conn.php';    
		$id = $_GET['id'];
		$sql = "DELETE FROM produto WHERE ID = $id";		
		mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);    
		if ($linhas > 0){      
			header('location:produto/gerenciar.php?msg=success');      
      exit; 
    }		
	}
	header('location:produto/gerenciar.php?msg=error');	
?>
