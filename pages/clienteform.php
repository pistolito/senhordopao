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
            $dados = array(($_POST["nom"]), ($_POST["cpf"]), ($_POST["datnasc"]), ($_POST["cargocod"]));
            $pessoaDAO->adicionarPessoa($dados);
            break;
    }
}



?>






    <html>

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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



                <!-- INICIO FORMULARIO DE CADASTRO DE CLIENTES -->
                <div class="form">
                    <h3>&nbsp;&nbsp;Nova Pessoa</h3>
                    <form action="" method="post">
                        <input type="hidden" name="operacao" value="<?= isset($operacao) ? $operacao : 'I' ?>">
                        <input name="cod" type="hidden" required="required" readonly="readonly" value="<?= isset($pessoa) ? $pessoa['cod'] : '' ?> " /> <br />

                        &nbsp;&nbsp;  Nome: &nbsp;&nbsp;<input type="text" name="nom"  required="required" value="<?= isset($pessoa) ? $pessoa['nom'] : '' ?>" /> <br />

                        &nbsp;&nbsp;  CPF: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" size="32" name="cpf" required="required" value="<?= isset($pessoa) ? $pessoa['cpf'] : '' ?> " /> <br />

                        &nbsp;&nbsp;   Data de Nascimento: <input type="date" name="datnasc" required="required"  value="<?= isset($pessoa) ? $pessoa['datnasc'] : '' ?> " /> <br />

                        &nbsp;&nbsp;  Cargo: &nbsp;&nbsp;<input type="number" width="100px" name="cargocod" required="required" value="<?= isset($pessoa) ? $pessoa['cargocod'] : '' ?> " /> <br />
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button name="btnSalvar" class="enviar" type="submit">Salvar</button>

                        <button name="btnLimpar" class="limpar" type="submit">Limpar</button>
                    </form> </br>
                    <div id="msg" style="text-align: center; font-size: 28; font-weight: bold; color: red"><?= isset($_GET['msg']) ? $_GET['msg'] : '' ?></div>
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
                            echo "<tr><td>Código&nbsp;&nbsp;</td><td>&nbsp;&nbsp;Nome&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;CPF&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>&nbsp;&nbsp;Data Nascimento&nbsp;&nbsp;</td><td></td></tr>";
                            foreach ($pessoas as $pessoa) {
                                echo "<tr><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $pessoa["cod"]
                                    . "</td><td>&nbsp;&nbsp;" . $pessoa["nom"]
                                    . "</td><td>&nbsp;&nbsp;" . $pessoa["cpf"]
                                    . "</td><td>&nbsp;&nbsp;" . $pessoa["datnasc"]
                                    . "</td><td><a href='pessoaform.php?operacao=E&codigo="
                                    . $pessoa["cod"] . "'><img src='../img/edit.png'/></a></td><td><a href='clienteform.php?operacao=D&codigo="
                                    . $pessoa["cod"] . "' onclick='return confirmacao(\"Deseja realmente excluir este cliente?\");'><img src='../img/delete.png'/></a></td></tr>";
                            }
                            echo "</table>";
                        }
                        ?>
                    </center>
                </div>



            </main>



            <script src="jquery/jquery.js" type="text/javascript"></script>
            <script src="js/bootstrap.js" type="text/javascript"></script>
            <script src="js/bootstrap.bundle.js" type="text/javascript"></script>




    </body>

    </html>