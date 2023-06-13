<?php
include  'pet.php';

$db = new ClasseDB();

if ($_SESSION ) {
    /* Pegando há quantos minutos a sessão foi iniciada e o horário atual */
    $inicio = new DateTime($_SESSION['inicio_sessao']);
    $agora = new DateTime(date('Y-m-d H:i:s'));

    $id_usuario = $_SESSION['id_usuario'];
  
    $timestamp1 = $inicio->getTimestamp();
    $timestamp2 = $agora->getTimestamp();
  
    $diferencaMinutos = round(($timestamp2 - $timestamp1) / 60);
  
    /* Controle de sessão (20 minutos) */
    if ($diferencaMinutos > 20) 
    {
      session_unset();
      session_destroy();

    }
  }
  else
  {
    session_unset();
    session_destroy();
    header("Location: login.php");
  }
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="./inicio.css">

    <title>Patinhas</title>

    <!-- BOOTSTRAP -->
    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <script src="./bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  
    <!-- FONTES -->
    <link href="https://fonts.googleapis.com/css2?family=Titan+One&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000&display=swap" rel="stylesheet" />

 
</head>

<body>

  <script>
    function logout()
    {
        fetch('pet.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        funcao: 'logout'
                    })
                })

       window.location.href = 'login.php';
    }
  

            
  </script>
    <!-- Menu -->
    <nav class="navbar bg-light">
        <div class="container-fluid">
            <a class="navbar-brand"><img src="./assets/imgs/logo.png" style="height: 40px" alt=""></a>
         

            <button class="btn btn-outline-success" type="submit" onclick='logout()'>Sair</button>
        </div>
    </nav>
    <div class="container pt-5">
        <div class="titulo">
            <h2>Meus pets</h2>
            <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#cadastroPet"><i class="bi bi-plus-square"></i></button>
        </div>

        <script>
            function cadastrarPet() {
                var formulario = document.getElementById('formulario_cadastro')
                var nome = formulario.elements["nome"].value
                var data = formulario.elements["data"].value
                var raca = formulario.elements["raca"].value
                var especie = formulario.elements["especie"].value

           
           
            fetch('pet.php', {
                    method: 'POST',
                    body: JSON.stringify({
                        nome: nome,
                        data: data,
                        raca: raca,
                        especie: especie,
                        funcao: 'cadastrar'
                    })
                })
                        .then(response => {
                     
                            if (!response.ok) {
                                throw new Error('Erro na solicitação.');
                            }
                            return response
                        })
                        .then(data => {
                            alert("Pet cadastrado com sucesso") 
                            location.reload();

                        })
                        .catch(error => {
                            alert("erro ao cadastrar o pet")
                        });

            }
            </script>

            <!-- cadastrar -->

        <div class="modal fade" id="cadastroPet" tabindex="-1" aria-labelledby="cadastroPetLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cadastroPetLabel">Cadastrar novo pet</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formulario_cadastro">

                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do pet</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: Noah">
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" name="data" id="data" >
                            </div>
                            <div class="mb-3">
                                <label for="raca" class="form-label">Raça</label>
                                <input type="text" class="form-control" name="raca" id="raca">
                            </div>
                            <div class="mb-3">
                                <label for="especie" class="form-label">Espécie</label>
                                <input type="text" class="form-control" name="especie" id="especie">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="cadastrarPet()">Cadastrar</button>
                    </div>

                </div>
            </div>
        </div>

           <!-- editar -->
     <script>

function mostrarEditar(id, nome, data, raca, especie)
{
    var formulario = document.getElementById('formulario_editar')
    var modalEditar = document.getElementById('modalEditarPet')

    formulario.elements["id"].value = id
    formulario.elements["nome"].value = nome
    formulario.elements["data"].value = data
    formulario.elements["raca"].value = raca
    formulario.elements["especie"].value = especie

    new bootstrap.Modal(modalEditar).show()

}

function editarPet() {
    var formulario = document.getElementById('formulario_editar')
    var id = formulario.elements['id'].value
    var nome = formulario.elements["nome"].value
    var data = formulario.elements["data"].value
    var raca = formulario.elements["raca"].value
    var especie = formulario.elements["especie"].value


fetch('pet.php', {
        method: 'POST',
        body: JSON.stringify({
            id: id,
            nome: nome,
            data: data,
            raca: raca,
            especie: especie,
            funcao: 'editar'
        })
    })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na solicitação.');
                }
                return response
            })
            .then(data => {
                alert("Pet editado com sucesso") 
                location.reload();

            })
            .catch(error => {
                alert("Erro ao editar o pet")
            });

}
</script>

        <div class="modal" id="modalEditarPet" >
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="editarPetLabel">Editar pet</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <form id="formulario_editar">
                            <input type="hidden" id='id' name='id'>
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome do pet</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Ex.: Noah">
                            </div>
                            <div class="mb-3">
                                <label for="data" class="form-label">Data de Nascimento</label>
                                <input type="date" class="form-control" name="data" id="data" >
                            </div>
                            <div class="mb-3">
                                <label for="raca" class="form-label">Raça</label>
                                <input type="text" class="form-control" name="raca" id="raca">
                            </div>
                            <div class="mb-3">
                                <label for="especie" class="form-label">Espécie</label>
                                <input type="text" class="form-control" name="especie" id="especie">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" onclick="editarPet()">Cadastrar</button>
                    </div>

                </div>
            </div>
        </div>



        <div class="pets">
        <?php
        
        $resultado = retornarPets();

        if(count($resultado) > 0):
            foreach($resultado as $linha):
        ?>
            <div class="pet bg-gray-100">
                <div class="info">
                    <div class="nome">
                    <?php echo $linha['nome']; ?>
                    </div>
                    <div class="dados">

                        <div class="data cadastro">
                        <?php echo $linha['dt_nascimento']; ?>
                        </div>
                        <div class="especie cadastro"><?php echo $linha['especie']; ?></div>
                        <div class="raca cadastro"><?php echo $linha['raca']; ?></div>
                    </div>

                </div>

                <div class="acoes">
                    <button type="button" class="btn btn-danger"  onclick="mostrarExcluirPet('<?php echo $linha['id_pet']; ?>', '<?php echo $linha['nome']; ?>')"><i class="bi bi-trash" ></i></button>
                    <button type="button" class="btn btn-warning" onclick="mostrarEditar('<?php echo $linha['id_pet']; ?>', '<?php echo $linha['nome']; ?>','<?php echo $linha['dt_nascimento']; ?>', '<?php echo $linha['raca']; ?>', '<?php echo $linha['especie']; ?>')"><i class="bi bi-pencil-square"></i></button>
                </div>
            </div>

            <?php
        endforeach;
    endif;
        ?>
        </div>

    </div>

 


<script>
function mostrarExcluirPet(id_pet, nome) {
    var modalDeletar = document.getElementById('modalDeletarPet')
    var titulo = modalDeletar.querySelector('.modal-title')
    var texto = modalDeletar.querySelector('.texto')
    var btnDeletar = modalDeletar.querySelector(".btn_deletar")
    titulo.textContent = 'Deletar o pet ' + nome
    texto.textContent = 'Tem certeza de que deseja deletar o pet com o nome '+nome+'?'
    btnDeletar.setAttribute("onclick","confirmarExcluirPet("+id_pet+");");
    new bootstrap.Modal(modalDeletar).show()
}

function confirmarExcluirPet(id_pet)
{
  fetch('pet.php', {
        method: 'POST',
        body: JSON.stringify({
            id_pet: id_pet,
            funcao: 'deletar'
        })
    })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Erro na solicitação.');
                }
                return response
            })
            .then(data => {
                alert("Pet excluído com sucesso") 
                location.reload();

            })
            .catch(error => {
                alert("erro ao deletar o pet")
            });

}
</script>


    <!-- Modal Deletar Pet-->
<div class="modal" id="modalDeletarPet">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" ></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="texto"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn_deletar btn btn-primary" >Deletar</button>
      </div>
    </div>
  </div>
</div>
</body>

</html>