<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="CSS/cadastro.css" />

  <title>Patinhas</title>

  <!-- BOOTSTRAP -->
  <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- CSS -->
  <link href="./assets/css/home.css" rel="stylesheet" />
  <link href="./cadastro.css" rel="stylesheet" />

  <!-- FONTES -->
  <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet" />

 


</head>

<body>
        <button class="btn btn-outline-info mt-3 ms-3" type="submit" onclick="window.location.href = 'login.php';">Voltar para o login</button>

  <!-- Título e imagem -->
  <div class="cadastro container pt-5">
  <div class="row">
    <div class="imagem w-100 d-flex flex-column justify-content-center align-items-center">
      <img src="./assets/imgs/logo.png" alt="Imagem de um porquinho da índia" />
    </div>

   
    <!-- Formulário -->
    <form class="row mt-5 g-3 needs-validation"  action="cadastrar.php" method="POST" id="form">

      

      <div class="col-md-6">
        <label for="nome" class="form-label">Nome completo</label>
        <div class="input-group has-validation">
          <input type="text" class="form-control" name="nome" id="nome" aria-describedby="inputGroupPrepend" required>
          
        </div>
      </div>

      

      <div class="col-md-6">
        <label for="email" class="form-label">E-mail</label>
        <div class="input-group has-validation">
          <input type="email" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required>
          
        </div>
      </div>

  

      <div class="col-md-6">
        <label for="cpf" class="form-label">CPF</label>
        <div class="input-group has-validation">
          <input type="text" class="form-control" id="cpf" name="cpf" aria-describedby="inputGroupPrepend" required>
        </div>
      </div>

    

      <div class="col-md-6">
        <label for="senha" class="form-label">Senha</label>
        <div class="input-group has-validation">
          <input type="password" class="form-control" name="senha"  id="senha" aria-describedby="inputGroupPrepend" required>
          
        </div>
      </div>

      <button class="btn btn-outline-info mt-5" type="submit">Cadastrar</button>
    </form>
</div>
  </div>

</body>

</html>