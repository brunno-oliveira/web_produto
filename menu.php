<?php
	if(!empty($_SESSION['usuario']) && !empty($_SESSION['senha'])){		
		$link = '
			<li role="presentation">
				<a href="/web_produto/produto/form_cadastro.php">Cadastrar Produtos</a>
			</li>
		  			  
			<li role="presentation">
				<a href="/web_produto/produto/gerenciar.php">Gerenciar Produtos</a>
			</li>
		  
			<li role="presentation">
				<a href="/web_produto/cliente/form_cadastro.php">Cadastrar Clientes</a>
			</li>
		  	
		  
			<li role="presentation">
				<a href="/web_produto/cliente/gerenciar.php">Gerenciar Clientes</a>
			</li>  
		  
			<li role="presentation">
				<a href="/web_produto/venda/exibir.php">Exibir / Buscar Vendas</a>
			</li>    
		  
			<li role="presentation">
				<a href="/web_produto/venda/cadastrar_selecionar_cliente.php">Cadastrar Vendas</a>
			</li> 		

			<li role="presentation">
				<a href="/web_produto/venda/gerenciar.php">Gerenciar Vendas</a>
			</li> 				
			
			<li role="presentation">
				<a href="/web_produto/usuario/logout.php" ?>Logout (logado como '.$_SESSION['usuario'].')</a>
			</li> ';       
	} else {		
		$link = '
			<li role="presentation">
				<a href="/web_produto/usuario/login.php" ?>Login </a>
			</li> ';     		
	}
?>

<ul class="nav nav-pills">
  <li role="presentation">
    <a href='<?php echo "/web_produto" ?>'>Home</a>
  </li>  
  <?php echo $link; ?>
</ul>
