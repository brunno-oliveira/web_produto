<?php include 'lock.php'; ?>
<?php if (!isset($_GET['id'])){
	echo $_GET['id'];
} ?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <title>Web Produto - Enviar Email</title>
  </head>
  <body class="container-fluid" >

<?php
	include 'menu.php';
	include 'conn.php';
	require 'aws_source/aws-autoloader.php';
	use Aws\Sns\SnsClient;
	
	$last_id = $_GET['id'];
	
	$sql = "SELECT v.id as VENDA_ID, c.nome as NOME_CLIENTE, 
			u.USUARIO as USUARIO, p.nome as PRODUTO, v.QTDE as QUANTIDADE, 
			v.VALOR as VALOR, v.TOTAL as TOTAL			
			FROM venda as v 
			INNER JOIN cliente as c
				ON c.id = v.cliente_id 
			INNER JOIN produto as p
				ON p.id = v.produto_id
			INNER JOIN usuario as u
				ON u.id = v.usuario_id
			WHERE v.id = $last_id;";			
	
	$result = mysqli_query($conn, $sql);
	$linha = mysqli_affected_rows($conn);
		if ($linha = 1){	
			$client = SnsClient::factory(array(				
				'scheme' => 'http',
				'version' => '2010-03-31',
				'credentials' => [
				  'key'    => 'XXXXXXXXXXXXXXXXXXXX',
				  'secret' => 'YYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY',
			 ],
				'region'  => 'us-east-1'
			));				
			
			$row = mysqli_fetch_assoc($result);	
			
			$resultSendEmail = $client->publish(array(
				 'TopicArn' => 'arn:aws:sns:us-east-1:794131280029:web_produtoVenda',		 		 
				 'Message' => 'O usuário '. $row["USUARIO"] .' registrou uma compra no total de ' . $row["TOTAL"]. 'R$ para o cliente ' . $row["NOME_CLIENTE"],
				 'Subject' => 'Compra realizada'
			));			
		} else {
			echo 'SHIT GONNE WRONG';
		}?>
  </body>
</html>