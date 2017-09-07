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
		$sql = "SELECT * FROM cliente";
		$result = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
		if ($linhas > 0){
			echo '<h2 class="text text-info">Clientes Cadastrados</h2>';
			echo '<table class="table table-striped">';
			echo '<tr>
            <th>ID #</th>
            <th>NOME</th>
            <th>E-MAIL</th>
            <th>CPF</th>				
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
				echo '<td><a href="cadastrar_selecionar_produto.php?clienteId='.$id.'">Selecionar</a></td>';				
				echo "</tr>";
			}
			echo "</table>";
      } else {
			echo '<h3 class="alert alert-warning">
              Nenhum cadastro feito. </h3>';
		}		
	?>	
	
</body>
</html>
