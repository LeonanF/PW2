<?php

require 'connection.php';
require_once 'verify.php';

// Consulta SQL para obter todos os dados da tabela
$sql = "SELECT * FROM contato_msg";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Exibir os dados da tabela
    while ($row = $result->fetch_assoc()) {
        // Acesso aos campos específicos da tabela
        $idSolicitacao = $row['id'];
        $nome = $row['nome'];
        $assunto = $row['assunto'];
        $email = $row['email'];
        $msg = $row['mensagem'];

        // Criar uma div para cada mensagem da tabela
        echo "<div class='solicitacao'>";
        echo "Solicitação " . $idSolicitacao . "<br>";
        echo "Nome: " . $nome . "<br>";
        echo "Assunto: " . $assunto . "<br>";
        echo "Email: " . $email . "<br>";
        echo "Mensagem: " . $msg . "<br>";
        echo "</div>";
    }
} else {
    echo "Nenhum dado encontrado na tabela.";
}

// Fechar a conexão com o banco de dados
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php"><button>Logout</button></a>
</body>
</html>