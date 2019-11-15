<?php
require '../sessao.php';
require '../classes/receitaDAO.class.php';


use padaria\dao\ReceitaDAO;



//CRIANDO UM NOVO CADASTRO DE RECEITA

$receitaDAO = new ReceitaDAO();

if (isset($_REQUEST["operacao"])) {
    $operacao = $_REQUEST["operacao"];
    switch ($operacao) {
        case "I":
            // inserindo um novo produto
            $dados= array(($_POST["procod"]),($_POST["ingrcod"]),($_POST["qnt"]),($_POST["custo"]));
            $receitaDAO->novaReceita($dados);
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

<title>Cadastro de Receitas</title>
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
      
   
     
      <!-- INICIO FORMULARIO CADASTRO RECEITA -->
    <div>
    <h3>Cadastro</h3>
    <form action="" method="post">
		<input type="hidden" name="operacao" value="<?=isset($operacao) ? $operacao : 'I'?>"> 
		
		Código Produto: <input type="number" name="procod" required="required"value="<?=isset($receita) ? $receita['procod'] : ''?>" /> <br />
		
		Código Ingrediente: <input type="number" name="ingrcod" required="required" value="<?=isset($receita) ? $receita['ingrcod'] : ''?> "/> <br />
		
		Quantidade: <input type="number" name="qnt" required="required"value="<?=isset($receita) ? $receita['qnt'] : ''?> "/> <br />
		
		Custo: <input type="number" name="custo" required="required"value="<?=isset($receita) ? $receita['custo'] : ''?> "/> <br />
		
	
		

		<button name="btnSalvar" type="submit">Salvar</button>
		
		<button name="btnLimpar" type="submit">Limpar</button>
	</form>      </br>
	<div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?=isset($_GET['msg']) ? $_GET['msg'] : ''?></div>   
     </div>
      
      
      <!-- FIM FORMULARIO CADASTRO RECEITA-->
      

       
  <!-- EXIBI��O DA TABELA DE RECEITAS -->     
<div align="center">       
<?php

echo "<center><h2>Receitas</h2></center>";
$receitas = $receitaDAO->buscarTodos();
if (isset($receitaDAO)) {
    echo "<table border='1' align='center'>";
    echo "<tr><td>Código Produto</td><td>Código Ingrediente</td><td>Quantidade</td><td>Quantidade</td><td>Custo</td><td></td></tr>";
    foreach ($receitas as $receita) {
        echo "<tr><td>" . $receita["procod"]
        . "</td><td>" . $receita["ingrcod"] 
        . "</td><td>" . $receita["qnt"] 
        . "</td><td>" . $receita["custo"]
        . "</td><td><a href='receitaform.php?operacao=E&codigo=" 
                . $receita["procod"] . "'><img src='../img/edit.png'/></a></td><td><a href='receitaform.php?operacao=D&codigo=" 
                . $receita["procod"] . "' onclick='return confirmacao(\"Deseja realmente excluir esta receita?\");'><img src='../img/delete.png'/></a></td></tr>";
    }
    echo "</table>";
}
?>		
</div>       
 <!-- FIM EXIBI��O DA TABELA DE RECEITAS -->   
	
       
        
       
       
    </main>

	
	
	
	
	<script src="jquery/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap.bundle.js" type="text/javascript"></script>
	
	
	
	
</body>
</html>