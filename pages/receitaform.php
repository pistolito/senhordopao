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
            $dados = array(($_POST["procod"]), ($_POST["ingrcod"]), ($_POST["qnt"]), ($_POST["custo"]));
            $receitaDAO->novaReceita($dados);
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



                <!-- INICIO FORMULARIO CADASTRO RECEITA -->
                <div>
                    <h3>&nbsp;&nbsp;Nova receita</h3>
                    <br>
                    <form action="" method="post">
                        <input type="hidden" name="operacao" value="<?= isset($operacao) ? $operacao : 'I' ?>">

                        &nbsp;&nbsp;Código Produto:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="procod" required="required" value="<?= isset($receita) ? $receita['procod'] : '' ?>" /> <br />

                        &nbsp;&nbsp;Código Ingrediente: <input type="number" name="ingrcod" required="required" value="<?= isset($receita) ? $receita['ingrcod'] : '' ?> " /> <br />

                        &nbsp;&nbsp;Quantidade: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="qnt" required="required" value="<?= isset($receita) ? $receita['qnt'] : '' ?> " /> <br />

                        &nbsp;&nbsp;Custo: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="custo" required="required" value="<?= isset($receita) ? $receita['custo'] : '' ?> " /> <br />


<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <button name="btnSalvar" class="enviar" type="submit">Salvar</button>

                        <button name="btnLimpar" class="limpar" type="submit">Limpar</button>
                    </form> </br>
                    <div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
                </div>
<hr>

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