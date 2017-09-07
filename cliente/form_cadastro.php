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
	?>

<form name="cadastro" action="cadastrado.php" method="post">
  <h2>Cadastro de Cliente</h2>
  <p>
    <label for="nome">Nome: </label><br>
    <input type="text" name="nome" required>
  </p>
  <p>
    <label for="email">E-mail: </label><br>
    <input type="email" name="email" required>
  </p>
  <p>
    <label for="cpf">CPF: </label><br>
    <input type="text" name="cpf" required>
  </p>  
  <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar!</button>
</form>
  </body>
</html>
