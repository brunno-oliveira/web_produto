<?php 
	if(!isset($_POST['prodId']) || !isset($_POST['clienteId'])
		|| !isset($_POST['qtde'])){
		header('location:exibir.php');
	} 
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <title>Ativide Avalitiva</title>
  </head>
  <body class="container-fluid" >
    <?php
		include '../menu.php';		
		include '../conn.php';
		
		$prodId = $_POST['prodId'];
		$clienteId = $_POST['clienteId'];
		$qtde = $_POST['qtde'];
		
		$sql = "INSERT INTO venda (CLIENTE_ID, PRODUTO_ID, QTDE ,TOTAL)
			VALUES ('$clienteId', '$prodId', '$qtde', 
				(SELECT (VALOR * '$qtde') FROM produto WHERE ID = '$prodId'))";
		
		$resultado = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
      if ($linhas > 0){
			echo '<h3 class="alert alert-success"> Operacao com sucesso!</h3>';
		} else{
			echo '<h3 class="alert alert-danger"> Erro ao inserir!</h3>';
		}								
    ?>
  </body>
</html>