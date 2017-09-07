<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<title>Trabalho Nuvem</title>
  </head>
  <body class="container-fluid">
	<?php
		include '../menu.php';
		include '../conn.php';
		
      $sql = "SELECT * FROM cliente";
		$resultado = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
		if ($linhas > 0){
			echo '<h2 class="text text-info">Clientes Cadastrados</h3>';
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
        include 'produto/form_cadastro.php';
      }							
   ?>
  </body>
</html>