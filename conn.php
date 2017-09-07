<!-- configurando arquivo de conexao banco -->
<?php
  $servidor = 'localhost';
  $usuario  = 'root';
  //$senha    = '#admin123%';
  $senha    = '';
  $bd       = 'estoque';
  // criar string de conexao com o banco
  $conn = new mysqli($servidor,$usuario,$senha,$bd);
  
  if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
?>
