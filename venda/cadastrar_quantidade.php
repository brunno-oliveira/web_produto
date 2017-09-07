<?php 
	if(!isset($_GET['prodId']) || !isset($_GET['clienteId'])){
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
<body class="container-fluid">
	<?php
		include '../menu.php';
		include '../conn.php';
		
		$prodId = $_GET['prodId'];
		$clienteId = $_GET['clienteId'];		
		
      $sql = "SELECT * FROM cliente where ID = $clienteId";
		$resultado = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
		if ($linhas > 0){
			echo '<h2 class="text text-info">Cliente Selecionado</h3>';
			echo '<table class="table table-striped">';
			echo '<tr>
						<th>ID #</th>
						<th>NOME</th>
						<th>E-MAIL</th>
						<th>CPF</th>					 
              </tr>';	
			for ($i = 0; $i < $linhas; $i++){
				echo "<tr>";
				$linha_atual = mysqli_fetch_assoc($resultado);
				foreach ($linha_atual as $valor){
					echo "<td>" . $valor . "</td>";
				}
				echo "</tr>";
			}
			echo "</table>";
      } else {
        echo '<h3 class="alert alert-warning">
              Nenhum cadastro feito. Use form abaixo para cadastrar </h3>';
        include 'exibir.php';
      }	
		
		
$sql = "SELECT ID, NOME, MARCA, VALOR FROM produto WHERE id = '$prodId'";
		$result = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
		if ($linhas > 0){
			echo '<h2 class="text text-info">Produto Selecionado</h2>';
			echo '<table class="table table-striped">';
			echo '<tr>
            <th>ID #</th>
            <th>NOME</th>
            <th>MARCA</th>
            <th>VALOR</th>								
            </tr>';				
				
			for ($i = 0; $i < $linhas; $i++){
				$linha_atual = mysqli_fetch_assoc($result);
				echo "<tr>";
				foreach ($linha_atual as $indice => $valor){				
					if($indice == "ID"){
						$id = $valor;
					}
					echo "<td>" . $valor . "</td>";
				}								
				echo "</tr>";
			}
			echo "</table>";
      } else {
			echo '<h3 class="alert alert-warning">
              Nenhum cadastro feito. </h3>';
		}					
	?>
	
	<h2 class="text text-info">Inserir a quantidade</h2>
	<form name="cadastro" action="cadastrado.php" method="post">
		<p>
			<label for="qtde">Quantidade: </label><br>
			<input type="text" name="qtde" required>
		</p>

		<input type="hidden" name="prodId" 
		value="<?php echo $prodId?>">
		
		<input type="hidden" name="clienteId" 
		value="<?php echo $clienteId?>">	
		
		<button type="submit" name="cadastrar" class="btn btn-success">Cadastrar!</button>		
	</form>	
</body>
</html>  	