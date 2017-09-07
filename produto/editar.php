<?php if (!isset($_GET['id'])){
	header('location:gerenciar.php');
} ?>
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
	$id = $_GET['id'];	

	$sql = "SELECT * FROM produto WHERE ID = $id";
	$result = mysqli_query($conn, $sql);
	$linhas = mysqli_affected_rows($conn);
	if($linhas > 0){
		$linha = mysqli_fetch_assoc($result);	
?>
	<form name="form_editar" action="editado.php" method="post">
	<h3 class="text text-info">Editar Contato</h3>

	<p>
		<label for="nome">Nome do produto: </label><br>
		<input type="text" name="nome" required
		value="<?php echo $linha['NOME']?>">
	</p>
	<p>
		<label for="marca">Marca: </label><br>
		<input type="text" name="marca" required
		value="<?php echo $linha['MARCA']?>">
	</p>	
	<p>
		<label for="valor">Valor Unitário: </label><br>
		<input type="text" name="valor" required
		value="<?php echo $linha['VALOR']?>">
	</p>
	<p>
		<label for="qtde">Quantidade em estoque: </label><br>
		<input type="number" name="qtde" required
		value="<?php echo $linha['QUANTIDADE']?>">
	</p>
	
	<!-- hidden field com o campo ID -->
	<input type="hidden" name="id" 
	value="<?php echo $linha['ID']?>">

	<button name="editar" type="submit" class="btn btn-warning">Editar</button>

	</form>

<?php	
	}else{
		header('location:gerenciar.php');
	}
 ?>
</body>
</html>