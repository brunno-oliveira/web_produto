<?php include '../lock.php'; ?>
<?php 
	if(!isset($_POST['prodId']) || !isset($_POST['clienteId'])
		|| !isset($_POST['qtde']) || !isset($_POST['valor'])){
		header('location:exibir.php');
	} 
?>
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
		include '../conn.php';
		
		$prodId = $_POST['prodId'];
		$clienteId = $_POST['clienteId'];
		$qtde = $_POST['qtde'];
		$valor = $_POST['valor'];
		$usuarioId = $_POST['usuarioId'];		
		
		$sql = "INSERT INTO venda (CLIENTE_ID, PRODUTO_ID, QTDE ,TOTAL, VALOR, USUARIO_ID)
			VALUES ('$clienteId', '$prodId', '$qtde', 
				($valor * '$qtde'), $valor, $usuarioId)";
		
		$resultado = mysqli_query($conn,$sql);
		$linhas = mysqli_affected_rows($conn);
      if ($linhas > 0){
			$last_id = mysqli_insert_id($conn);
			echo '<h3 class="alert alert-success"> Operacao com sucesso!</h3>';			
			?>
				<form name="enviarEmail" action="../enviarEmail.php?id='.$last_id'" method="get">
					<input type="hidden" name="id" 
						value="<?php echo $last_id?>">				
					<button type="submit" class="btn btn-primary">Enviar por e-mail</button>
				</form>
			<?php
		} else{
			echo '<h3 class="alert alert-danger"> Erro ao inserir!</h3>';
		}								
    ?>
  </body>
</html>