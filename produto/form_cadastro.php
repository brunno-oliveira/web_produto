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
	?>

<form name="cadastro" action="cadastrado.php" method="post">
  <h2>Cadastro de Contato</h2>
  <p>
    <label for="nome">Nome do produto: </label><br>
    <input type="text" name="nome" required>
  </p>
  <p>
    <label for="marca">Marca: </label><br>
    <input type="text" name="marca" required>
  </p>
  <p>
    <label for="valor">Valor Unitário: </label><br>
    <input type="text" name="valor" required>
  </p>
  <p>
    <label for="qtde">Quantidade em Estoque: </label><br>
    <input type="number" name="qtde" required>
  </p>
  <button type="submit" name="cadastrar" class="btn btn-success">Cadastrar!</button>
</form>
  </body>
</html>
