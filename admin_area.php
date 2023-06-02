<?php

require 'connection.php';
require_once 'verify.php';

// Consulta SQL para obter todos os dados da tabela
$sql = "SELECT * FROM contato_msg";
$result = $conn->query($sql);

$hasData = $result->num_rows > 0;




// Fechar a conexão com o banco de dados
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/admin_area.css">
    <title>Document</title>
</head>
<body>
    <header>

    <div class="title-container">
    <h1 class="title">Área de controle</h1>
    </div>
        
    <div class="btn-container"><a href="logout.php"><button class="btn-logout">Logout</button></a></div>
    </header>

    <main>
        <section class="container-exception">
        <?php 
        if(!$hasData){
            echo "<div class='exception'><p>Nenhum dado encontrado na tabela</p></div>";
            
        } 
        ?>
        </section>

        <section class="contatos-container">
        
        <?php
        
        if ($hasData) {
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
                echo "<p>Solicitação " . $idSolicitacao . "</p>";
                echo "<p>Nome: " . $nome . "</p>";
                echo "<p>Assunto: " . $assunto . "</p>";
                echo "<p>Email: " . $email . "</p>";
                echo "<p>Mensagem: " . $msg . "</p>";
                echo "</div>";
        
            }
        }
        ?>
        </section>

    </main>

</body>
</html>