<?php include '../lock.php'; ?>
<?php if (!isset($_GET['id'])){
	header('location:gerenciar.php');
} ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>Editar Venda</title>
</head>
<body class="container-fluid">
		
<?php 
	include '../menu.php';	
	include '../conn.php';
	$id = $_GET['id'];	

			$sql = "SELECT v.id as VENDA_ID, c.nome as NOME_CLIENTE, 
			u.USUARIO as USUARIO, p.nome as PRODUTO, v.QTDE as QUANTIDADE, 
			v.TOTAL as TOTAL, v.VALOR as VALOR			
			FROM venda as v 
			INNER JOIN cliente as c
				ON c.id = v.cliente_id 
			INNER JOIN produto as p
				ON p.id = v.produto_id
			INNER JOIN usuario as u
				ON u.id = v.usuario_id
			WHERE v.id = $id";	
	$result = mysqli_query($conn, $sql);
	$linhas = mysqli_affected_rows($conn);
	if($linhas > 0){
		$linha = mysqli_fetch_assoc($result);	
?>
	<form name="form_editar" action="editado.php" method="post">
	<h3 class="text text-info">Editar Venda</h3>
	<h5 class="text text-danger">Atenção! Só é possível editar a quantidade e o valor.</h5>
	
	<p>
		<label for="usuario">Usuário que realizou a venda: </label><br>
		<input type="text" name="usuario" readonly="readonly"
		value="<?php echo $linha['USUARIO']?>">
	</p>		
	
	<p>
		<label for="cliente">Cliente: </label><br>
		<input type="text" name="cliente" readonly="readonly"
		value="<?php echo $linha['NOME_CLIENTE']?>">
	</p>	
	
	<p>
		<label for="quantidade">Quantidade: </label><br>
		<input type="number" name="quantidade" required
		value="<?php echo $linha['QUANTIDADE']?>">
	</p>
	
	<p>
		<label for="valor">Valor por unidade: </label><br>
		<input type="number" name="valor" required
		value="<?php echo $linha['VALOR']?>">
	</p>	
	
	<p>
		<label for="total">Total: </label><br>
		<input type="number" name="total" readonly="readonly"
		value="<?php echo $linha['TOTAL']?>">
	</p>
	
	<!-- hidden field com o campo ID -->
	<input type="hidden" name="id" 
	value="<?php echo $linha['VENDA_ID']?>">

	<button name="editar" type="submit" class="btn btn-warning">Editar</button>

	</form>

<?php	
	}else{
		header('location:gerenciar.php');
	}
 ?>
</body>
</html>