<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>PHP - Aula 15 - Cadastro de Usuário</title>
</head>
<body class="container-fluid">
<?php include '../menu.php'; 
	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if($msg == 'empty'){
			echo '<h3 class="alert alert-warning">ATENÇÃO: Preencha todos os campos do formulário</h3>';		
		}else if($msg == 'success'){
			echo '<h3 class="alert alert-success">Usuário cadastrado com sucesso!</h3>';					
		}else if($msg == 'error'){
			echo '<h3 class="alert alert-danger">ATENÇÃO: Não foi possível cadastrar usuário</h3>';
		}
	}
?>
<h2 class="text text-info">Cadastro de Usuário</h2>
<form name="cadastrar_usuario" action="usuario_cadastrado.php" method="post">
	<p>
		<label for="usuario">Usuario:</label><br>
		<input type="text" name="usuario">
	</p>
	<p>
		<label for="senha">Senha:</label><br>
		<input type="password" name="senha">
	</p>	
	<p>
		<label for="email">E-mail:</label><br>
		<input type="email" name="email">
	</p>
	<button type="submit" name="cadastrar" class="btn btn-success">
	Cadastrar</button>
</form>


</body>
</html>