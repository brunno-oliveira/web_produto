<?php include '../lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<title>Web Produto - Exibir / Buscar Vendas</title>
  </head>
  <body class="container-fluid">  
	<?php
		include '../menu.php';
		include '../conn.php';	
	?>
	<form name="buscar" action="buscar.php" method="get">
		<h2 class="text text-info">Buscar venda</h3>	
		<p>
			<label for="cliente">Cliente: </label><br>
			<input type="text" name="cliente" required>
		</p>
		<button type="submit" class="btn btn-success">Buscar</button>
	</form>
	<?php
      $sql = "SELECT v.id as VENDA_ID, c.nome as NOME_CLIENTE, 
			p.nome as PRODUTO, v.QTDE as QUANTIDADE, v.TOTAL as TOTAL
			FROM venda as v INNER JOIN cliente as c
			ON c.id = v.cliente_id INNER JOIN produto as p
			ON p.id = v.produto_id;";
			
		$resultado = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
		if ($linhas > 0){
			echo '<h2 class="text text-info">Vendas Cadastradas</h3>';
			echo '<table class="table table-striped">';
			echo '<tr>
                <th>ID #</th>
                <th>CLIENTE</th>
                <th>PRODUTO</th>
                <th>QTDE</th>
				<th>TOTAL</th>
              </tr>';	
			for ($i = 0; $i < $linhas; $i++){
				echo "<tr>";
				$linha_atual = mysqli_fetch_assoc($resultado);
				foreach ($linha_atual as $valor){
					echo "<TD>" . $valor . "</TD>";
				}
				echo "</tr>";
			}
			echo "</TABLE>";
      } else {
        echo '<h3 class="alert alert-warning">
              Nenhum cadastro feito.</h3>';        
      }							
   ?>
  </body>
</html>