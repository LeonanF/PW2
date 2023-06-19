<?php

//Verificar se houve erro de login
if (isset($_GET['error']) && $_GET['error'] == 'login_required') {
    $error_message = 'Você deve fazer login primeiro.';
}

//Verificar se dados foram inseridos errados
if (isset($_GET['error']) && $_GET['error'] == 'not_match') {
    $error_message = 'O usuário ou senha inserido está incorreto.<br>Por favor, verifique os dados ou se cadastre.';
}

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require 'connection.php';

    // Obter os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Verificar se o usuário já existe no banco de dados
    $sql = "SELECT * FROM usuarios WHERE nome = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $error_message = 'O nome de usuário já está sendo usado. Por favor, escolha outro.';
    } else {
        // Criptografar a senha
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Inserir o novo administrador no banco de dados
        $sql = "INSERT INTO usuarios (nome, senha) VALUES ('$username', '$hashed_password')";
        $result = $conn->query($sql);

        if ($result === true) {
            $success_message = 'Administrador cadastrado com sucesso!';
        } else {
            $error_message = 'Erro ao cadastrar administrador: ' . $conn->error;
        }
    }

// Fechar a conexão com o banco de dados
$conn->close();

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Administrador</title>
    <link rel="stylesheet" href="./css/cadastro.css">
    <link rel="stylesheet" href="./css/reset.css">
    <script src="./js/autenticacao.js" defer></script>
    <script src="./js/reset.js" defer></script>
    <script src="https://kit.fontawesome.com/340c674620.js" crossorigin="anonymous"></script>
</head>
<body>

    <header>
        <div class="logo">
            <a href="index.html">
                <img src="./assets/brasaouepa-removebg-preview (1).png" alt="Emblema da UEPA">
            </a>
        </div>

        <nav>
            <div class="fechar-menu">
                <i class="fa-solid fa-xmark"></i>
            </div>

            <ul class="div-flex-horizontal">
                <li><a href="./graduacao.html">Graduação</a></li>
                <li><a href="./avaliacao.html">Sistema de Avaliação</a></li>
                <li><a href="./form_contato.php">Fale Conosco</a></li>
                <li><a href="./curso.html">Curso</a></li>
                <li><a class="style-login" href="./cadastro.php">Login</a></li>
            </ul>
        </nav>

        <div class="menu div-flex-vertical">
            <div class="linha-menu"></div>
            <div class="linha-menu"></div>
            <div class="linha-menu"></div>
        </div>
    </header>

    <div class="container">
        <div class="img-form">
            <img class="img-container" src="./assets/brasaouepa-removebg-preview (1).png" alt="Imagem ilustrativa de três pessoas conversando">
        </div>

        <div class="form">
            <div class="cabecalho-cadastro">
				<h1 class="title-aut">Cadastrar Administrador</h1>
                <p class="autent-msg">
                <?php if (isset($success_message)) : ?>
                    <?php echo $success_message . " Deseja fazer <button class='btn-revert-2'>login</button>?"; ?>
                <?php endif; ?>
                <?php if (isset($error_message)) : ?>
                    <?php echo $error_message. " Deseja fazer <button class='btn-revert-2'>login</button>?"; ?>
                <?php endif; ?>
                </p>
			</div>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="input-grp">
                    <div class="input-box">
                        <label for="username">Nome de usuário:</label>
                        <input type="text" id="username" name="username" required><br>
                    </div>

                    <div class="input-box">
                        <label for="password">Senha:</label>
                        <input type="password" id="password" name="password" required><br>
                    </div>
                    <input class="botao-enviar" type="submit" value="Cadastrar">
                </div>
            </form>
            
        <button class="btn-revert">Já possui cadastro?</button>

        <?php if(isset($_GET['logout']) && $_GET['logout'] == 'successful'):?>
            <script>
                if (document.readyState === "complete") {
                    document.querySelector('.btn-revert').click()
                } else {
                    document.addEventListener("DOMContentLoaded", ()=>{
                        document.querySelector('.btn-revert').click()
                    })
                }
            </script>
        <?php endif;?>
        </div>
    </div>

    <footer>
        &copy; Copyright João Manoel | Leonan Freitas | Lucas Vinicius
    </footer>
</body>
</html>
