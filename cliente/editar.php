<?php include '../lock.php'; ?>
<?php if (!isset($_GET['id'])){
	header('location:gerenciar.php');
} ?>
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
	$id = $_GET['id'];	

	$sql = "SELECT * FROM cliente WHERE id = $id";
	$result = mysqli_query($conn, $sql);
	$linhas = mysqli_affected_rows($conn);
	if($linhas > 0){
		$linha = mysqli_fetch_assoc($result);	
?>
	<form name="form_editar" action="editado.php" method="post">
	<h3 class="text text-info">Editar Cliente</h3>

	<p>
		<label for="nome">Nome: </label><br>
		<input type="text" name="nome" required
		value="<?php echo $linha['NOME']?>">
	</p>
	<p>
		<label for="email">E-mail: </label><br>
		<input type="email" name="email" required
		value="<?php echo $linha['EMAIL']?>">
	</p>	
	<p>
		<label for="cpf">CPF: </label><br>
		<input type="text" name="cpf" required
		value="<?php echo $linha['CPF']?>">
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