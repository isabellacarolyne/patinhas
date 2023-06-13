<?php
/* Inicia a sessão */
session_start();

/* Dados do banco */
$nome_servidor = "sql10.freemysqlhosting.net";
$nome_usuario = "sql10624840";
$senha = "tIreMQAlwg";
$nome_banco = "sql10624840";


/* Conexão com o banco */
$conecta = new mysqli($nome_servidor, $nome_usuario, $senha, $nome_banco);
if ($conecta->connect_error) {
    die("Conexão falhou: " . $conecta->connect_error . "<br>");
}
echo "Conexão com o banco realizada com sucesso<br>";

/* Pegando dados do formulário */
$email = $_POST['email'];
$senha_usuario = $_POST['senha'];

/* Verificando o e-mail e a senha no banco */
$resultado = $conecta->query("SELECT * FROM usuario where email ='$email' and senha ='$senha_usuario'");
if ($resultado->num_rows > 0) {
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    $_SESSION['id_usuario'] = $resultado->fetch_row()[0];
    $_SESSION['nome'] = $resultado->fetch_row()[1];
    $_SESSION['inicio_sessao'] = date('Y-m-d H:i:s');
    header("Location: inicio.php");
} else {

    header("Location: login.php?status=error");
}

/* Encerrando a conexão */
$conecta->close();
