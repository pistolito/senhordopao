<?php
	require 'sessao.php';
?>
<html lang="pt-br">
<head>
<!-- Required meta tags -->
<meta charset="UTF-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/estrutura.css" type="text/css">

<title>Senhor Do Pão</title>
</head>
<body>


<link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
<div class="">
    <div id="sidebar-wrapper" class="sidebar-toggle">
        <ul class="sidebar-nav">
            <div class="row justify-content-center" id="ufpb-logo">
                 <a href="index.php"><img src="img/logofull.png" height="200px"/></a>
            </div>
            <li>
                <a href="pages/clienteform.php">Cadastro de Clientes</a>
            </li>
            <li>
                <a href="pages/fornecedorform.php">Cadastro de Fornecedores</a>
            </li>
            <li>
                <a href="pages/produtoform.php">Cadastro de Produtos</a>
            </li>
            <li>
                <a href="pages/receitaform.php">Cadastro de Receitas</a>
            </li>
            <li>
           	 	<a href="pages/pontodevenda.php">Ponto de Venda</a>
            </li>
            <li>
                <!-- AREA DO DONO/GERENTE ACESSO RESTRITO CARGOS 1 E 2 -->
    			<a href="pages/cargoform.php">Cadastro de Cargos</a>
            </li>
            <li>
               <a href="login.php">Sair</a>
            </li>
        </ul>
    </div>
    <main>
       <div class="apresentacao">
        <a href="#"><img src="img/logofull.png" height="200px"/></a>
       <h2>Senhor do Pão</h2></br>
       <h3>Aplicação para controle e gerenciamento do estabelecimento</h3>
       </div>
       
       <div class="deselvolvido">
       <p>Todos os direitos reservados, Senhor Do Pão, 2019</p>
       <p>Desenvolvido por: 
       <a href="https://www.facebook.com/jonathan.raupp.9">Jonathan Raupp</a>, 
       <a href="https://www.facebook.com/joaopaulo.rockenbach">João Paulo Rockenbach</a> e 
       <a href="https://www.facebook.com/profile.php?id=100007192997539">Junior Fernandes da Costa</a>.
       </p>
       </div>
       
       
       

       
       
       
       
       
       
    </main>
              
                      
	<script src="jquery/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap.bundle.js" type="text/javascript"></script>
</body>
</html>