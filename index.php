
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Patinhas</title>

    <!-- BOOTSTRAP -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- CSS -->
    <link href="./assets/css/home.css" rel="stylesheet" />
    <link href="./assets/css/style.css" rel="stylesheet" />

    <!-- FONTES -->
    <link
      href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap"
      rel="stylesheet"
    />

    <style>
      .card-item{
        min-width: 166px;
    flex-grow: 1;
  flex-basis: 0;
}

    </style>

 
  </head>
  <body>
    <div class="container h-100">
      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid navbar-patinhas">
          <a class="navbar-brand" href="#"
            ><img
              class="logo-patinhas"
              src="./assets/imgs/logo.png"
              alt="Logo patinhas"
          /></a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Início</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#servicos"
                  >Serviços</a
                >
              </li>
              
            </ul>
              <button class="btn btn-outline-success"  onclick="window.location.href = 'login.php';">
                Login
              </button>
          </div>
        </div>
      </nav>

      <section class="row inicio" id="inicio">
        <div class="col-md-12 col-lg-6 info pt-5 pb-5">
          <h1 class="titulo mb-3">
            O centro de cuidados<br />
            para o seu pet
          </h1>
          <p>
            Cadastre já o seu pet para podermos recebê-lo com muito carinho e
            lhe oferecer os serviços. Aqui ele será tratado como um membro da
            nossa família de bichinhos.
          </p>

          <div class="especies mt-5">
            <h5 class="titulo-especies">Nós podemos cuidar do seu:</h5>

            <ul class="lista-especies">
              <li>
                <img src="./assets/imgs/especies/cachorro.png" alt="Cachorro" />
                <label>Cachorro</label>
              </li>
              <li>
                <img src="./assets/imgs/especies/gato.png" alt="Gato" />
                <label>Gato</label>
              </li>
              <li>
                <img src="./assets/imgs/especies/passaro.png" alt="Pássaro" />
                <label>Pássaro</label>
              </li>
              <li>
                <img src="./assets/imgs/especies/mamifero.png" alt="Mamífero" />
                <label>Mamífero</label>
              </li>
              <li>
                <img src="./assets/imgs/especies/reptil.png" alt="Réptil" />
                <label>Réptil</label>
              </li>
            </ul>
          </div>

          <div class="cadatro"></div>
        </div>
        <div class="col-md-12 col-lg-6 h-full">
          <!-- <div class="img-barkground" id="imagem_aleatoria"></div> -->
          <img
            class="img-barkground"
            src="./assets/imgs/backgrAUnd.png"
            alt=""
          />
          <div class="img-barkground-md">
            <img
              class="imagem"
              src="./assets/imgs/barkground_maubile.png"
              alt=""
            />
          </div>
        </div>
      </section>
      <section class="row inicio" id="servicos">
        <div class="col-12 ">
          <h1 class='text-center'>O que oferecemos ao seu pet</h1>
          <h5 class="mt-3 text-center">
            Nossos serviços são dedicados ao seu PET, oferecendo carinho e
            cuidado especial para o bem-estar do seu amado companheiro. Venha
            fazer parte dessa jornada repleta de amor e ternura pelos animais!
          </h5>

          <div class="row items-servicos mt-5">
            <div class="card card-item" >
              <img
                src="./assets/imgs/servicos/hospedagem.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-text">Hospedagem</p>
              </div>
            </div>

            <div class="card card-item" >
              <img
                src="./assets/imgs/servicos/banho_tosa.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-text">Banho e tosa</p>
              </div>
            </div>

            <div class="card card-item" >
              <img
                src="./assets/imgs/servicos/vet.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-text">Veterinário</p>
              </div>
            </div>

            <div class="card card-item" >
              <img
                src="./assets/imgs/servicos/vacina.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-text">Vacina</p>
              </div>
            </div>

            <div class="card card-item" >
              <img
                src="./assets/imgs/servicos/adestramento.png"
                class="card-img-top"
                alt="..."
              />
              <div class="card-body">
                <p class="card-text">Adestramento</p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </body>
</html>
