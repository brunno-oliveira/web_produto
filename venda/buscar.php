<?php include '../lock.php'; ?>
<?php if (!isset($_GET['cliente'])){
	header('location:exibir.php');
} ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Web Produdo - Buscar Venda</title>
</head>
<body class="container-fluid">
		
<?php 
	include '../menu.php';	
	include '../conn.php';
	$cliente = $_GET['cliente'];	

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
			WHERE c.nome LIKE '%$cliente%';";
			
	$result = mysqli_query($conn, $sql);
	$linhas = mysqli_affected_rows($conn);
	if($linhas > 0){	
		echo '<h2 class="text text-info">Vendas Cadastradas para o cliente '.$cliente.' </h3>';
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
				$linha_atual = mysqli_fetch_assoc($result);
				echo "<tr>";
				foreach ($linha_atual as $indice => $valor){									
					echo "<td>" . $valor . "</td>";
				}
			}				
	} else {	
		echo $sql;
		echo 'Nenhum registro encontrado';
	}		
?>
</body>
</html>