<?php include 'verify_session.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title>Ativide Avalitiva</title>
  </head>
  <body class="container-fluid" >
    <?php
		include 'menu.php';      
		if(!empty($_SESSION['usuario'])){					
			include 'conn.php';
			
			$sql = "SELECT v.id as VENDA_ID, c.nome as NOME_CLIENTE, 
				u.USUARIO as USUARIO, p.nome as PRODUTO, v.QTDE as QUANTIDADE, 
				v.VALOR as VALOR, v.TOTAL as TOTAL			
				FROM venda as v 
				INNER JOIN cliente as c
					ON c.id = v.cliente_id 
				INNER JOIN produto as p
					ON p.id = v.produto_id
				INNER JOIN usuario as u
					ON u.id = v.usuario_id
				ORDER BY v.id DESC LIMIT 10;";			
					
			$result = mysqli_query($conn, $sql);
			$linhas = mysqli_affected_rows($conn);
			if ($linhas > 0){
				echo '<h2 class="text text-info">Vendas Cadastradas</h2>';
				echo '<table class="table table-striped">';
				echo '<tr>
				<th>ID #</th>
				<th>CLIENTE</th>
					<th>USUARIO</th>
				<th>PRODUTO</th>
				<th>QTDE</th>
					<th>VALOR</th>
					<th>TOTAL</th>				
				</tr>';				
					
				for ($i = 0; $i < $linhas; $i++){				
					echo "<tr>";
					$linha_atual = mysqli_fetch_assoc($result);
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
		} else {
			echo '<h3 class="alert alert-info">Bem vindo ao Web Produto. Por favor faça o Login.</h3>';
		}
    ?>
  </body>
</html>