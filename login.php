<?php
// verificar se o login e senha são válidos
require 'classes/UsuarioDAO.class.php';

use padaria\dao\UsuarioDAO;

session_start();

$usuarioDAO = new UsuarioDAO();

if (isset($_SESSION["usuario"])) unset($_SESSION["usuario"]);

if (isset($_POST["login"]) && isset($_POST["senha"])) {
    // verifica o login
    $retorno = $usuarioDAO->validarLogin($_POST["login"], $_POST["senha"]);
    if ($retorno) {
        // cria a sessão
        session_start();
        $_SESSION["usuario"] = $_POST["login"];
        header("Location: index.php");
    }
    else {
        // mensagem de erro caso login/senha não funcionem
        $mensagem = "Login e/ou senha inválidos! Tente novamente!";
    }
}

?>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="css/estrutura.css" type="text/css">
	<title>Senhor Do Pão - Login</title>
</head>
<body>
	
	<div class="login">
	<a href="index.php"><img src="img/logofull.png" height="200px"/></a>
	</br>
	<?php 
		if (isset($mensagem)) 
		    echo "<span style='color:red;'>$mensagem</span>"; 
	?>
	&nbsp;&nbsp;&nbsp;
	<form action="" name="frmLogin" method="post">
		<input type="text" name="login" required="required"
		maxlength="100" autofocus="autofocus" 
		placeholder="Login"/>
		<p/>
		<input type="password" name="senha" required="required"
		maxlength="100" placeholder="Senha"/>
		<p/>
		<button name="btnAcessar" class="btn btn-success" type="submit">Acessar</button>
		<!-- espaço em html -->
		&nbsp;&nbsp;&nbsp;
		<button name="btnLimpar" class="btn btn-danger" type="reset">Limpar</button>
		<p/>
			
	</form>
	</div>
	
	<script src="jquery/jquery.js" type="text/javascript"></script>
	<script src="js/bootstrap.js" type="text/javascript"></script>
	<script src="js/bootstrap.bundle.js" type="text/javascript"></script>
</body>
</html>