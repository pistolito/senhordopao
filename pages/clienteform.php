<?php
require '../sessao.php';
require '../classes/pessoaDAO.class.php';

use padaria\dao\PessoaDAO;



//CRIANDO UM NOVO CADASTRO DE PESSOA

$pessoaDAO = new PessoaDAO();

if (isset($_REQUEST["operacao"])) {
    $operacao = $_REQUEST["operacao"];
    switch ($operacao) {
        case "I":
            // inserindo uma nova pessoa
            $dados= array(($_POST["nom"]),($_POST["cpf"]),($_POST["datnasc"]),($_POST["cargocod"]));
            $pessoaDAO->adicionarPessoa($dados);
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

<title>Cadastro de Clientes</title>
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
      
      
      
      <!-- INICIO FORMULARIO DE CADASTRO DE CLIENTES -->
     <div class="form">
     <h3>Cadastro</h3>
    <form action="" method="post">
		<input type="hidden" name="operacao" value="<?=isset($operacao) ? $operacao : 'I'?>"> 
		Código: <input type="number" name="cod" required="required" readonly="readonly"  value="<?=isset($pessoa) ? $pessoa['cod'] : ''?> "/> <br />	
		
		Nome: <input type="text" name="nom" required="required"value="<?=isset($pessoa) ? $pessoa['nom'] : ''?>" /> <br />
		
		CPF: <input type="number" name="cpf" required="required" value="<?=isset($pessoa) ? $pessoa['cpf'] : ''?> "/> <br />
		
		Data de Nascimento: <input type="date" name="datnasc" required="required"value="<?=isset($pessoa) ? $pessoa['datnasc'] : ''?> "/> <br />
		
		Cargo: <input type="number" name="cargocod" required="required" value="<?=isset($pessoa) ? $pessoa['cargocod'] : ''?> "/> <br />
		

		<button name="btnSalvar" type="submit">Salvar</button>
		
		<button name="btnLimpar" type="submit">Limpar</button>
	</form>      </br>
	<div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?=isset($_GET['msg']) ? $_GET['msg'] : ''?></div>   
      </div> 
      
      
      <!-- FIM FORMULARIO DE CADASTRO DE CLIENTES -->
      
      

       
  <!-- EXIBIÇÃO DA TABELA PESSOAS/CLIENTES -->     
 <div class="tabela">
 <center> 
<?php

echo "<center><h2>Clientes</h2></center>";
$pessoas = $pessoaDAO->buscarTodos();
if (isset($pessoaDAO)) {
    echo "<table border='1' align='center'>";
    echo "<tr><td>Código</td><td>Nome</td><td>CPF</td><td>Data Nascimento</td><td></td></tr>";
    foreach ($pessoas as $pessoa) {
        echo "<tr><td>" . $pessoa["cod"]
        . "</td><td>" . $pessoa["nom"] 
        . "</td><td>" . $pessoa["cpf"] 
        . "</td><td>" . $pessoa["datnasc"] 
        . "</td><td><a href='pessoaform.php?operacao=E&codigo=" 
                . $pessoa["cod"] . "'><img src='../img/edit.png'/></a></td><td><a href='clienteform.php?operacao=D&codigo=" 
                . $pessoa["cod"] . "' onclick='return confirmacao(\"Deseja realmente excluir este cliente?\");'><img src='../img/delete.png'/></a></td></tr>";
    }
    echo "</table>";
}
?>	
</center>	
 </div>             
 <!-- FIM EXIBIÇÃO DA TABELA PESSOAS/CLIENTES -->   
	
       
       
       
       
    </main>
			

	
	<script src="jquery/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap.bundle.js" type="text/javascript"></script>
	
	
	
	
</body>
</html>