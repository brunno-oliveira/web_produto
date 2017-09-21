<?php include '../lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <title>Ativide Avalitiva</title>
  </head>
  <body class="container-fluid" >
    <?php
		include '../menu.php';
		if(empty($_POST['nome']) ||
			empty($_POST['marca']) ||
			empty($_POST['valor']) ||
			empty($_POST['qtde'])){
				
			echo '<h3 class="alert alert-danger"> Preencher todo formulario</h3>';
			include 'produto/form_cadastro.php';				
		} else {
			include '../conn.php';
			$nome  = $_POST['nome'];
			$marca = $_POST['marca'];
			$valor = $_POST['valor'];
			$qtde  = $_POST['qtde'];
			
			$sql = "INSERT INTO produto (NOME, MARCA, VALOR, QUANTIDADE) VALUES ('$nome','$marca', $valor, $qtde)";			
			$resultado = mysqli_query($conn,$sql);
			$linhas = mysqli_affected_rows($conn);
         if ($linhas > 0){
				echo '<h3 class="alert alert-success"> Operacao com sucesso!</h3>';
			} else{
				echo '<h3 class="alert alert-danger"> Erro ao inserir!</h3>';
			}			
		}			
    ?>
  </body>
</html>