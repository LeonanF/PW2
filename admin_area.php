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
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/admin_area.css">
    <script src="./js/admin.js" defer></script>
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo"><img src="./assets/brasaouepa-removebg-preview (1).png" alt="Emblema da UEPA"></div>
        <div class="btn-container"><a href="logout.php"><button class="btn-logout">Logout</button></a></div>
    </header>

    <main>

    <div class="title-container">
        <h1 class="title">Área de controle</h1>
    </div>
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
                echo "<div class='idSolicit'><p>Solicitação " . $idSolicitacao . "</p><span class='arrow'></span></div>";
                echo "<div class='fieldsSolicit'><p>Nome: " . $nome . "</p>";
                echo "<p>Assunto: " . $assunto . "</p>";
                echo "<p>Email: " . $email . "</p>";
                echo "<p>Mensagem: " . $msg . "</p>";
                echo "</div></div>";
        
            }
        }
        ?>
        </section>

    </main>

    <footer>
        &copy; Copyright João Manoel | Leonan Freitas | Lucas Vinicius
    </footer>

</body>
</html>