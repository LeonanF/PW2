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

<?php

require 'connection.php';

$tablename = "contato_msg"; // Nome da tabela


// Processa os dados do formulário somente se o formulário for enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["nome"]) && isset($_POST["assunto"]) && isset($_POST["email"]) && isset($_POST["msg"])) {
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
}

if (isset($_GET["success"]) && $_GET["success"] == 1) {
    echo "<p class='confirm'>Dados inseridos com sucesso!</p>";
}


// Fecha a conexão com o banco de dados
$conn->close();
?>

<form action="<?=$_SERVER['PHP_SELF']?>" method="post">
    <div class="imagem">
        <img src="./assets/atendentes.png" alt="desenho de atendentes">
    </div>
    
    <label for="nome">Nome completo</label>
    <input type="text" id="nome" name="nome" placeholder="ex: Anderson Serra da Costa" required>

    <label for="assunto">Assunto</label>
    <select name="assunto" id="assunto" required>
        <option value=""></option>
        <option value="A">A</option>
        <option value="B">B</option>
        <option value="C">C</option>
        <option value="D">D</option>
    </select>

    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" placeholder="ex: gutierrez@gmail.com" required>

    <label for="msg">Mensagem</label>
    <textarea id="msg" name="msg" rows="5" style="resize: none;" placeholder="Descreva o seu problema" required></textarea>

    <input type="submit" value="Enviar">
</form>
</body>
</html>
