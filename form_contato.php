<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/contato.css">
    <link rel="stylesheet" href="./css/reset.css">
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
                <li><a href="">Contato</a></li>
                <li><a class="style-login" href="./cadastro.php">Login</a></li>
            </ul>
        </nav>

        <div class="menu div-flex-vertical">
            <div class="linha-menu"></div>
            <div class="linha-menu"></div>
            <div class="linha-menu"></div>
        </div>
    </header>

    <main class="div-flex-horizontal">
        <?php

        require 'connection.php';

        $tablename = "contato_msg"; // Nome da tabela

        // Processa os dados do formulário somente se o formulário for enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nome"]) && !empty($_POST["assunto"]) && !empty($_POST["email"]) && !empty($_POST["msg"])){
            $nome = $_POST["nome"];
            $assunto = $_POST["assunto"];
            $email = $_POST["email"];
            $mensagem = $_POST["msg"];

            // Insere os dados na tabela
            $sql = "INSERT INTO $tablename (nome, assunto, email, mensagem) VALUES ('$nome', '$assunto', '$email', '$mensagem')";

            if ($conn->query($sql) === TRUE) {
                header("Location: ".$_SERVER['PHP_SELF']."?success=1");
            } else {
                echo "Erro ao inserir os dados: " . $conn->error;
            }
        } else {
            $emptyError = "Todos os dados precisam estar preenchidos!";
        }

        // Fecha a conexão com o banco de dados
        $conn->close();
        ?>

        <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
            <div class="imagem">
                <img src="./assets/atendentes.png" alt="desenho de atendentes">
            </div>
            
            <?php
            if (isset($_GET["success"]) && $_GET["success"] == 1) {
            echo "<p class='confirm'>Dados inseridos com sucesso!</p>";
        } else{
            echo "<p class='confirm'>".$emptyError."</p>";
        }
        ?>

            <label for="nome">Nome completo</label>
            <input type="text" id="nome" name="nome" placeholder="ex: Anderson Serra da Costa" required>

            <label for="assunto">Assunto</label>
            <select name="assunto" id="assunto" required>
                <option value=""></option>
                <option value="Diretoria do curso">Diretoria do curso</option>
                <option value="Protocolo">Protocolo</option>
                <option value="Diretoria pedagogica">Diretoria pedagógica</option>
                <option value="Outros">Outros</option>
            </select>

            <label for="email">E-mail</label>
            <input type="email" id="email" name="email" placeholder="ex: gutierrez@gmail.com" required>

            <label for="msg">Mensagem</label>
            <textarea id="msg" name="msg" rows="5" style="resize: none;" placeholder="Descreva o seu problema" required></textarea>

            <input type="submit" value="Enviar">
        </form>
    </main>

    <footer>
            &copy; Copyright João Manoel | Leonan Freitas | Lucas Vinicius
    </footer>

    <script src="js/reset.js"></script>
    <script src="https://kit.fontawesome.com/340c674620.js" crossorigin="anonymous"></script>
</body>
</html>
