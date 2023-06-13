<?php
/* Início de sessão */
session_start();

/* Checando se há conexão */
if ($_SESSION && $_SESSION['inicio_sessao']) {
  /* Pegando há quantos minutos a sessão foi iniciada e o horário atual */
  $inicio = new DateTime($_SESSION['inicio_sessao']);
  $agora = new DateTime(date('Y-m-d H:i:s'));

  $timestamp1 = $inicio->getTimestamp();
  $timestamp2 = $agora->getTimestamp();

  $diferencaMinutos = round(($timestamp2 - $timestamp1) / 60);

  /* Controle de sessão (20 minutos) */
  if ($diferencaMinutos < 21) {
    header("Location: inicio.php");
  } else {
    session_unset();
    session_destroy();
  }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="login.css" />

  <title>Patinhas</title>

  <!-- BOOTSTRAP -->
  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- CSS -->
  <link href="login.css" rel="stylesheet" />

  <!-- FONTES -->
  <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet" />

  <!-- Javascript -->
  <!-- Script p/ validar os campos do formulário -->
  <script>
    function validarFormulario() {
      // CAMPOS
      const email = document.getElementById("email");
      const senha = document.getElementById("senha");
      // ERROS
      const email_erro = document.getElementById("email_erro");
      const senha_erro = document.getElementById("senha_erro");

      var tem_erro = false;

      if (email.value.length < 6) {
        email.style.border = "2px solid #e63636";

        email_erro.style.display = "block";
        tem_erro = true;
      }

      if (senha.value.length < 6) {
        senha.style.border = "2px solid #e63636";

        senha_erro.style.display = "block";
        tem_erro = true;
      }

      if (tem_erro) {
        return false;
      } else {
        return true;
      }
    }
  </script>

  <!-- Script p/ avisar que o usuário foi cadastrado com sucesso -->
  <script>
    window.onload = function() {
      const urlParams = new URLSearchParams(window.location.search);
      if (urlParams.get('status') && urlParams.get('status') == 'success') {

        // Criar o elemento de alerta
        var alerta = document.createElement('div');
        alerta.classList.add('alert');
        alerta.innerText = 'Cadastro realizado com sucesso!';

        // Inserir o elemento de alerta no corpo da página
        document.body.appendChild(alerta);

        // Remover o elemento de alerta após 3 segundos
        setTimeout(function() {
          alerta.remove();
        }, 3000);

      } else if (urlParams.get('status') && urlParams.get('status') == 'error') {
        // Criar o elemento de alerta
        var alerta = document.createElement('div');
        alerta.classList.add('alert');
        alerta.classList.add('erro');
        alerta.innerText = 'Usuário ou senha incorretos';

        // Inserir o elemento de alerta no corpo da página
        document.body.appendChild(alerta);

        // Remover o elemento de alerta após 3 segundos
        setTimeout(function() {
          alerta.remove();
        }, 3000);
      }
    };
  </script>
</head>

<body>
  <!-- Título e imagem -->
  <div class="login pt-5 container">
    <div class="row">
    <div class="imagem w-100 d-flex flex-column justify-content-center align-items-center">
      <img src="./assets/imgs/logo.png" alt="Imagem de um porquinho da índia" />
    </div>
    <!-- Formulário -->
    <form class="col-md-12 mt-5 d-flex flex-column justify-content-center align-items-center g-3 needs-validation" action="./recebe_login.php" method="POST" id="form">
      

      <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <div class="input-group has-validation">
          <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required>
          <div class="invalid-feedback">
            Email inválido
          </div>
        </div>
      </div>

      <div class="col-md-6 mt-3">
        <label for="senha" class="form-label">Senha</label>
        <div class="input-group has-validation">
          <input type="password" class="form-control" name="senha"  id="senha" aria-describedby="inputGroupPrepend" required>
          
        </div>
      </div>

      <button class="btn btn-outline-info mt-4" type="submit">Entrar</button>

    </form>
    <br />
    <!-- Redirecionamento: cadastro -->
    <p class='text-center mt-5'>Não tem conta? <a href="cadastro.php">Cadastre-se</a></p>
    </div>
   
  </div>
</body>

</html>