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

            $dados = array(($_POST["cnpj"]), ($_POST["nom"]), ($_POST["rua"]), ($_POST["bairro"]), ($_POST["endnum"]), ($_POST["cep"]), ($_POST["endref"]), ($_POST["datfun"]),);
            $fornecedorDAO->novoFornecedor($dados);
            break;
    }
}



?>






    <html>

    <head>
        <!-- Required meta tags -->
        <meta charset="UTF-8>
<meta name=" viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/estrutura.css" type="text/css">

        <style>
            input[type=text] {
                width: 30%;
                padding: 7px;
                margin: 5px 0;
                box-sizing: border-box;
            }

            input[type=number] {
                width: 30%;
                padding: 7px;
                margin: 5px 0;
                box-sizing: border-box;
            }

            input.referencia {

                width: 29%;
                padding: 7px;
                margin: 5px 0;
                box-sizing: border-box;

            }

            input[type=date] {
                width: 26%;
                padding: 7px;
                margin: 5px 0;
                box-sizing: border-box;
            }

            button.enviar {
                background-color: #008CBA;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }

            button.limpar {
                background-color: #e7e7e7;
                color: black;
                border: none;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
            }
        </style>

        <script type="text/javascript" src="../js/funcoes.js"></script>

        <title>Senhor do Pão</title>
    </head>

    <body>
        <!--  MENU -->
        <link rel="stylesheet" type="text/css" media="screen" href="../css/estrutura.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="../css/bootstrap.min.css" />
        <div class="">
            <div id="sidebar-wrapper" class="sidebar-toggle">
                <ul class="sidebar-nav">
                    <div class="row justify-content-center" id="ufpb-logo">
                        <a href="../index.php"><img src="../img/logofull.png" height="200px" /></a>
                    </div>
                    <li>
                        <a href="../pages/clienteform.php">Pessoas</a>
                    </li>
                    <li>
                        <a href="../pages/fornecedorform.php">Fornecedores</a>
                    </li>
                    <li>
                        <a href="../pages/produtoform.php">Produtos</a>
                    </li>
                    <li>
                        <a href="../pages/receitaform.php">Receitas</a>
                    </li>
 
                    <li>
                        <a href="../login.php">Sair</a>
                    </li>
                </ul>
            </div>
            <main>

                <!-- MENU FIM -->



                <!-- INICIO FORMULARIO DE CADASTRO DE FORNECEDORES -->
                <div>
                    <h3>&nbsp;&nbsp;Novo Fornecedor</h3>
                    <br>
                    <form action="" method="post">
                        <input type="hidden" name="operacao" value="<?= isset($operacao) ? $operacao : 'I' ?>">
                        &nbsp;&nbsp; CNPJ:&nbsp; &nbsp;&nbsp; <input type="number" margin="" name="cnpj" required="required" value="<?= isset($fornecedor) ? $fornecedor['cnpj'] : '' ?> " /> <br />

                        &nbsp;&nbsp; Nome:&nbsp;&nbsp;&nbsp;<input type="text" name="nom" required="required" value="<?= isset($fornecedor) ? $fornecedor['nom'] : '' ?>" /> <br />

                        &nbsp;&nbsp; Rua:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="rua" required="required" value="<?= isset($fornecedor) ? $fornecedor['rua'] : '' ?> " /> <br />

                        &nbsp;&nbsp; Bairro:&nbsp; &nbsp;&nbsp;<input type="text" name="bairro" required="required" value="<?= isset($fornecedor) ? $fornecedor['bairro'] : '' ?> " /> <br />

                        &nbsp;&nbsp; Número:<input type="number" name="endnum" required="required" value="<?= isset($fornecedor) ? $fornecedor['endnum'] : '' ?> " /> <br />

                        &nbsp;&nbsp; CEP:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type="number" name="cep" required="required" value="<?= isset($fornecedor) ? $fornecedor['cep'] : '' ?> " /> <br />

                        &nbsp;&nbsp; Referência:<input type="text" class="referencia" name="endref" value="<?= isset($fornecedor) ? $fornecedor['endref'] : '' ?> " /> <br />

                        &nbsp;&nbsp; Data Fundação: <input type="date" name="datfun" required="required" value="<?= isset($fornecedor) ? $fornecedor['datfun'] : '' ?> " /> <br />

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button name="btnSalvar" class="enviar" type="submit">Salvar</button>

                        <button name="btnLimpar" class="limpar" type="submit">Limpar</button>
                    </form> </br>
                    <div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>

                </div>
                <hr>

                <!-- FIM FORMULARIO DE CADASTRO DE FORNECEDORES -->





                <!-- EXIBIÇÃO DA TABELA FORNECEDORES -->
                <div align="center">
                    <?php

                    echo "<center><h2>Fornecedores</h2></center>";
                    $fornecedores = $fornecedorDAO->buscarTodos();
                    if (isset($fornecedorDAO)) {
                        echo "<table border='1' align='center'>";
                        echo "<tr><td>CNPJ  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Nome  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Rua &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Bairro &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Número</td><td>CEP&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Ponto d/Referência &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Data Fundação</td></tr>";
                        foreach ($fornecedores as $fornecedor) {
                            echo "<tr><td>&nbsp;" . $fornecedor["cnpj"]
                                . "</td><td>&nbsp;" . $fornecedor["nom"]
                                . "</td><td>&nbsp;" . $fornecedor["rua"]
                                . "</td><td>&nbsp;" . $fornecedor["bairro"]
                                . "</td><td>&nbsp;&nbsp;&nbsp;" . $fornecedor["endnum"]
                                . "</td><td>&nbsp;" . $fornecedor["cep"]
                                . "</td><td>&nbsp;" . $fornecedor["endref"]
                                . "</td><td>&nbsp;" . $fornecedor["datfun"]
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