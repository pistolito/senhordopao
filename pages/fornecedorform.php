<?php
require '../sessao.php';
require '../classes/FornecedorDAO.class.php';

use padaria\dao\FornecedorDAO;



//CRIANDO UM NOVO CADASTRO DE FORNECEDOR

$fornecedorDAO = new FornecedorDAO();

if (isset($_REQUEST["operacao"])) {
    $operacao = $_REQUEST["operacao"];
    switch ($operacao) {
        case "I":
            // inserindo um novo fornecedor
           
            $dados= array(($_POST["cnpj"]),($_POST["nom"]),($_POST["rua"]),($_POST["bairro"]),($_POST["endnum"]),($_POST["cep"]),($_POST["endref"]),($_POST["datfun"]),);
            $fornecedorDAO->novoFornecedor($dados);
            break;
            
    }
}



?>






<html>
<head>
<!-- Required meta tags -->
<meta charset="UTF-8>
<meta name="viewport"
	content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/estrutura.css" type="text/css">

<script type="text/javascript" src="../js/funcoes.js"></script>

<title>Cadastro de Fornecedores</title>
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
      
      
      
      <!-- INICIO FORMULARIO DE CADASTRO DE FORNECEDORES -->
     <div><h3>Cadastro</h3>
    <form action="" method="post">
		<input type="hidden" name="operacao" value="<?=isset($operacao) ? $operacao : 'I'?>"> 
		CNPJ: <input type="number" name="cnpj" required="required" value="<?=isset($fornecedor) ? $fornecedor['cnpj'] : ''?> "/> <br />	
		
		Nome: <input type="text" name="nom" required="required"value="<?=isset($fornecedor) ? $fornecedor['nom'] : ''?>" /> <br />
		
		Rua: <input type="text" name="rua" required="required" value="<?=isset($fornecedor) ? $fornecedor['rua'] : ''?> "/> <br />
		
		Bairro: <input type="text" name="bairro" required="required"value="<?=isset($fornecedor) ? $fornecedor['bairro'] : ''?> "/> <br />
		
		Número: <input type="number" name="endnum" required="required" value="<?=isset($fornecedor) ? $fornecedor['endnum'] : ''?> "/> <br />
		
		CEP: <input type="number" name="cep" required="required" value="<?=isset($fornecedor) ? $fornecedor['cep'] : ''?> "/> <br />
		
		Referência: <input type="text" name="endref" value="<?=isset($fornecedor) ? $fornecedor['endref'] : ''?> "/> <br />
		
		Data Fundação: <input type="date" name="datfun" required="required" value="<?=isset($fornecedor) ? $fornecedor['datfun'] : ''?> "/> <br />
		

		<button name="btnSalvar" type="submit">Salvar</button>
		
		<button name="btnLimpar" type="submit">Limpar</button>
	</form>      </br>
	<div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?=isset($_GET['msg']) ? $_GET['msg'] : ''?></div>   
      
      </div> 
      
      <!-- FIM FORMULARIO DE CADASTRO DE FORNECEDORES -->
      
      
      
      
       
  <!-- EXIBIÇÃO DA TABELA FORNECEDORES -->     
<div align="center">      
<?php

echo "<center><h2>Fornecedores</h2></center>";
$fornecedores = $fornecedorDAO->buscarTodos();
if (isset($fornecedorDAO)) {
    echo "<table border='1' align='center'>";
    echo "<tr><td>CNPJ</td><td>Nome</td><td>Rua</td><td>Bairro</td><td>Número</td><td>CEP</td><td>Ponto d/Referência</td><td>Data Fundação</td></tr>";
    foreach ($fornecedores as $fornecedor) {
        echo "<tr><td>" . $fornecedor["cnpj"]
        . "</td><td>" . $fornecedor["nom"] 
        . "</td><td>" . $fornecedor["rua"] 
        . "</td><td>" . $fornecedor["bairro"] 
        . "</td><td>" . $fornecedor["endnum"]
        . "</td><td>" . $fornecedor["cep"]
        . "</td><td>" . $fornecedor["endref"]
        . "</td><td>" . $fornecedor["datfun"] 
        . "</td><td><a href='fornecedorform.php?operacao=E&codigo=" 
                . $fornecedor["cnpj"] . "'><img src='../img/edit.png'/></a></td><td><a href='fornecedorform.php?operacao=D&codigo=" 
                . $fornecedor["cnpj"] . "' onclick='return confirmacao(\"Deseja realmente excluir este fornecedor\");'><img src='../img/delete.png'/></a></td></tr>";
    }
    echo "</table>";
}
?>		
  </div>      
 <!-- FIM EXIBIÇÃO DA TABELA FORNECEDORES -->   
	
        
       
       
       
    </main>

	
	<script src="jquery/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap.bundle.js" type="text/javascript"></script>
	
	
	
	
</body>
</html>