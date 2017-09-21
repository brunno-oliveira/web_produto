<?php include '../lock.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <title>Web Produto - Gerenciar Vendas</title>
  </head>
  <body class="container-fluid" >
    <?php
      include '../menu.php';
		
		if (isset($_GET['msg'])){
			$msg = $_GET['msg'];
			if ($msg == 'success'){
				echo '<h3 class="alert alert-success">Produto excluido com sucesso.</h3>';
			}else if($msg == 'success2'){
				echo '<h3 class="alert alert-success">Produto editado com sucesso.</h3>';
			}else if ($msg == 'error'){
            echo '<h3 class="alert alert-danger">ATENÇÃO: Erro ao excluir Produto.</h3>';
			}else if ($msg == 'error2'){
            echo '<h3 class="alert alert-danger">
            ATENÇÃO: Erro ao carregar form de edição de Produto.</h3>';
			}else if ($msg == 'error3'){
            echo '<h3 class="alert alert-danger">
            ATENÇÃO: Preencha todos os dados no form de edição.</h3>';
			}else if ($msg == 'error4'){
            echo '<h3 class="alert alert-danger">
            ATENÇÃO: Erro ao editar Produto.</h3>';
        }  
      }				
		include '../conn.php';
		
		$isAdmin = 0;
		if($_SESSION['usuario'] == 'admin'){
			$isAdmin = 1;
		}
		
		$sql = "SELECT v.id as VENDA_ID, c.nome as NOME_CLIENTE, 
			u.USUARIO as USUARIO, p.nome as PRODUTO, v.QTDE as QUANTIDADE, 
			v.VALOR as VALOR, v.TOTAL as TOTAL			
			FROM venda as v 
			INNER JOIN cliente as c
				ON c.id = v.cliente_id 
			INNER JOIN produto as p
				ON p.id = v.produto_id
			INNER JOIN usuario as u
				ON u.id = v.usuario_id";			
		
		if($isAdmin){
			$endQuery = ";";
		} else {
			$id = $_SESSION['id'];	
			$endQuery = "WHERE v.usuario_id = $id;";			
		}

		$result = mysqli_query($conn, $sql . ' ' . $endQuery);
		$linhas = mysqli_affected_rows($conn);
		if ($linhas > 0){
			echo '<h2 class="text text-info">Vendas Cadastradas</h2>';
			echo '<table class="table table-striped">';
			echo '<tr>
            <th>ID #</th>
            <th>CLIENTE</th>
				<th>USUARIO</th>
            <th>PRODUTO</th>
            <th>QTDE</th>
				<th>VALOR</th>
				<th>TOTAL</th>				
            </tr>';				
				
			for ($i = 0; $i < $linhas; $i++){
				$linha_atual = mysqli_fetch_assoc($result);
				echo "<tr>";
				foreach ($linha_atual as $indice => $valor){				
					if($indice == "VENDA_ID"){
						$id = $valor;
					}
					echo "<td>" . $valor . "</td>";
				}
				echo '<td><a href="editar.php?id='.$id.'">Editar</a></td>';
				echo '<td><a href="deletar.php?id='.$id.'">Deletar</a></td>';
				echo "</tr>";
			}
			echo "</table>";
      } else {		
			if($isAdmin){
				echo '<h3 class="alert alert-warning">
					Nenhum cadastro feito. </h3>';
			} else {
				echo '<h3 class="alert alert-warning">
					Nenhum cadastro feito pelo seu usuário </h3>';
			}
		}
    ?>
  </body>
</html>