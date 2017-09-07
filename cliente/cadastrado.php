<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <title>Trabalho Nuvem</title>
  </head>
  <body class="container-fluid" >
    <?php
		include '../menu.php';
		if(empty($_POST['nome']) ||
			empty($_POST['email']) ||
			empty($_POST['cpf'])){
				
			echo '<h3 class="alert alert-danger"> Preencher todo formulario</h3>';
			include 'produto/form_cadastro.php';				
		} else {
			include '../conn.php';
			$nome  = $_POST['nome'];
			$email = $_POST['email'];
			$cpf = $_POST['cpf'];			
			
			$sql = "INSERT INTO cliente (NOME, EMAIL, CPF) VALUES ('$nome','$email', '$cpf')";			
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