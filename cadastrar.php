
    <?php
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
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    /* Validação do formulário */
    $erro = FALSE;

    // if (empty($nome) or strlen($nome) < 4) {
    //     echo "Digite o nome corretamente. <br>";
    //     $erro = TRUE;
    // }

    echo !empty($nome) ? "Nome: {$nome}<br/>" : "Favor digitar seu nome<br/>";

    if (empty($cpf) or strlen($cpf) < 11) {
        echo "CPF inválido. <br>";
        $erro = TRUE;
    }

    // if (strlen($email) < 8 or !strstr($email, '@')) {
    //     echo "E-mail inválido. <br>";
    //     $erro = TRUE;
    // }

    echo (!empty($email) and filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Email: {$email}<br/>" : "Favor digitar seu email ou um email válido<br/>";

    if (strlen($senha) < 6) {
        echo "A senha deve possuir ao menos 5 caracteres. <br>";
        $erro = TRUE;
    }

    if (!$erro) {
        echo "Todos os dados foram digitados corretamente! <br>";
    }


    /* Buscando e-mail ou cpf no banco de dados */
    $sql = $conecta->query("SELECT * FROM usuario where email='$email' or cpf='$cpf'");
    if (mysqli_num_rows($sql) > 0) {
        echo "O usuário já está cadastrado";
        exit;
    } else {
        /* Adicionando os dados do cadastro no banco */
        $sql = "INSERT INTO usuario (nome, cpf, email, senha) VALUES ('$nome', '$cpf', '$email', '$senha')";

        if ($conecta->query($sql)) {
            header("Location: login.php?status=success");
        } else {
            echo "Erro no cadastro $sql. " . $conecta->error . "<br>";
        }
    }

    /* Encerrando a conexão */
    $conecta->close();

    ?>
