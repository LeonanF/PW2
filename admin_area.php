<?php

require 'connection.php';

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