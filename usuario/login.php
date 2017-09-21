<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<title>PHP - Aula 15 - Entrar</title>
</head>
<body class="container-fluid">

<?php include '../menu.php'; 

	if(isset($_GET['msg'])){
		$msg = $_GET['msg'];
		if($msg == "empty"){
			echo '<h3 class="alert alert-warning">Atenção: preencha todo o formulário de login</h3>';		
		}else if($msg == "invalid"){
			echo '<h3 class="alert alert-danger">Login ou senha inválidos. Tente novamente</h3>';		
		}else if($msg == "errorLogin"){
			echo '<h3 class="alert alert-info">Por favor, efetue o login para acessar a área restrita:</h3>';
		}else if($msg == "sucess"){
			echo '<h3 class="alert alert-sucess">Logado com sucesso!:</h3>';			
		}
	}
?>

<h2 class="text text-info">Entrar no Sistema</h2>
<form name="login" action="validar.php" method="post">	
	<p>
		<label for="usuario">Usuário:</label><br>
		<input type="text" name="usuario">
	</p>
	<p>
		<label for="senha">Senha:</label><br>
		<input type="password" name="senha">
	</p>
	<button name="entrar" type="submit" class="btn btn-success">Entrar</button> 
	
	<a href="cadastrar_usuario.php" class="btn btn-info">Cadastre-se!</a>
</form>

</body>
</html>