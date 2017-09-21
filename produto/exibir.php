<?php include '../lock.php'; ?>
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
		
      $sql = "SELECT * FROM produto";
		$resultado = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
		if ($linhas > 0){
			echo '<h2 class="text text-info">Produtos Cadastrados</h3>';
			echo '<table class="table table-striped">';
			echo '<tr>
                <th>ID #</th>
                <th>NOME</th>
                <th>MARCA</th>
                <th>VALOR</th>
					 <th>QUANTIDADE</th>
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