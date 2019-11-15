<?php
require '../sessao.php';
require '../classes/produtoDAO.class.php';


use padaria\dao\ProdutoDAO;



//CRIANDO UM NOVO CADASTRO DE PRODUTO

$produtoDAO = new ProdutoDAO();

if (isset($_REQUEST["operacao"])) {
    $operacao = $_REQUEST["operacao"];
    switch ($operacao) {
        case "I":
            // inserindo um novo produto
            $dados= array(($_POST["nom"]),($_POST["peso"]),($_POST["preco"]));
            $produtoDAO->adicionarProduto($dados);
            break;
            
    }
}



?>






<html>
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/estrutura.css" type="text/css">

<script type="text/javascript" src="../js/funcoes.js"></script>

<title>Cadastro de Produtos</title>
</head>
<body>
	<!--  MENU -->
 	<link rel="stylesheet" type="text/css" media="screen" href="../css/estrutura.css" />
 	<link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
	<div class="">
    <div id="sidebar-wrapper" class="sidebar-toggle">
        <ul class="sidebar-nav">
            <div class="row justify-content-center" id="ufpb-logo">
                 <a href="../index.php"><img src="../img/logofull.png" height="200px"/></a>
            </div>
            <li>
                <a href="../pages/clienteform.php">Cadastro de Clientes</a>
            </li>
            <li>
                <a href="../pages/fornecedorform.php">Cadastro de Fornecedores</a>
            </li>
            <li>
                <a href="../pages/produtoform.php">Cadastro de Produtos</a>
            </li>
            <li>
                <a href="../pages/receitaform.php">Cadastro de Receitas</a>
            </li>
            <li>
           	 	<a href="../pages/pontodevenda.php">Ponto de Venda</a>
            </li>
            <li>
                <!-- AREA DO DONO/GERENTE ACESSO RESTRITO CARGOS 1 E 2 -->
    			<a href="../pages/cargoform.php">Cadastro de Cargos</a>
            </li>
            <li>
               <a href="../login.php">Sair</a>
            </li>
        </ul>
    </div>
    <main>

      <!-- MENU FIM -->
      
   
      
      <!-- INICIO FORMULARIO DE CADASTRO DE PRODUTOS -->
     <div>
     <h3>Cadastro</h3>
    <form action="" method="post">
		<input type="hidden" name="operacao" value="<?=isset($operacao) ? $operacao : 'I'?>"> 
		
		Nome: <input type="text" name="nom" required="required"value="<?=isset($produto) ? $produto['nom'] : ''?>" /> <br />
		
		Peso: <input type="number" name="peso" required="required" value="<?=isset($produto) ? $produto['peso'] : ''?> "/> <br />
		
		Valor: <input type="number" name="preco" required="required"value="<?=isset($produto) ? $produto['preco'] : ''?> "/> <br />
		
	
		

		<button name="btnSalvar" type="submit">Salvar</button>
		
		<button name="btnLimpar" type="submit">Limpar</button>
	</form>      </br>
	<div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?=isset($_GET['msg']) ? $_GET['msg'] : ''?></div>   
     </div>  
      
      
      <!-- FIM FORMULARIO DE CADASTRO DE PRODUTOS -->
      

       
  <!-- EXIBI��O DA TABELA DE PRODUTOS -->     
<div align="center">      
<?php

echo "<center><h2>Produtos</h2></center>";
$produtos = $produtoDAO->buscarTodos();
if (isset($produtoDAO)) {
    echo "<table border='1' align='center'>";
    echo "<tr><td>Código</td><td>Nome</td><td>Peso</td><td>Valor</td><td></td><td></td></tr>";
    foreach ($produtos as $produto) {
        echo "<tr><td>" . $produto["procod"]
        . "</td><td>" . $produto["nom"] 
        . "</td><td>" . $produto["peso"] 
        . "</td><td>" . $produto["preco"]
        . "</td><td><a href='produtoform.php?operacao=E&codigo=" 
                . $produto["procod"] . "'><img src='../img/edit.png'/></a></td><td><a href='produtoform.php?operacao=D&codigo=" 
                . $produto["procod"] . "' onclick='return confirmacao(\"Deseja realmente excluir este produto?\");'><img src='../img/delete.png'/></a></td></tr>";
    }
    echo "</table>";
}
?>		
 </div>       
 <!-- FIM EXIBI��O DA TABELA DE PRODUTOS -->   
	
       
       
       
       
    </main>

	
	
	
	
	<script src="jquery/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap.bundle.js" type="text/javascript"></script>
	
	
	
	
</body>
</html>