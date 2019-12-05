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
            $dados = array(($_POST["nom"]), ($_POST["peso"]), ($_POST["preco"]));
            $produtoDAO->adicionarProduto($dados);
            break;
    }
}



?>






    <html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
        <link rel="stylesheet" href="css/estrutura.css" type="text/css">

        <script type="text/javascript" src="../js/funcoes.js"></script>

        <title>Senhor do Pão</title>
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

                width: 28%;
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



                <!-- INICIO FORMULARIO DE CADASTRO DE PRODUTOS -->
                <div>
                    <h3>Novo Produto</h3>
                    <br>
                    <form action="" method="post">
                        <input type="hidden" name="operacao" value="<?= isset($operacao) ? $operacao : 'I' ?>">

                        Nome: <input type="text" name="nom" required="required" value="<?= isset($produto) ? $produto['nom'] : '' ?>" /> <br /> <br>

                        Peso: &nbsp;&nbsp;<input type="number" step="0.01" name="peso" required="required" value="<?= isset($produto) ? $produto['peso'] : '' ?> " /> <br /> <br>

                        Valor: &nbsp; <input type="number" step="0.01" name="preco" required="required" value="<?= isset($produto) ? $produto['preco'] : '' ?> " /> <br /> <br>
                        

                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button name="btnSalvar" class="enviar" type="submit">Salvar</button>

                        <button name="btnLimpar" class="limpar" type="submit">Limpar</button>
                    </form> </br>
                    <div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
                </div>

                <hr>   
                <!-- FIM FORMULARIO DE CADASTRO DE PRODUTOS -->



                <!-- EXIBI��O DA TABELA DE PRODUTOS -->
                <div align="center">
                    <?php

                    echo "<center><h2>Produtos</h2></center>";
                    $produtos = $produtoDAO->buscarTodos();
                    if (isset($produtoDAO)) {
                        echo "<table border='1' align='center'>";
                        echo "<tr><td>Código&nbsp;&nbsp;&nbsp;&nbsp;</td><td>Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;Peso&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;Valor&nbsp;&nbsp;&nbsp;</td><td></td><td></td></tr>";
                        foreach ($produtos as $produto) {
                            echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;" . $produto["procod"]
                                . "</td><td>&nbsp;&nbsp;" . $produto["nom"]
                                . "</td><td>&nbsp;&nbsp;" . $produto["peso"]
                                . "</td><td>&nbsp;&nbsp;" . $produto["preco"]
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