<?php 

$servername = "localhost"; // Nome do servidor MariaDB
$username = "root"; // Nome de usuário do banco de dados
$password = ""; // Senha do banco de dados
$dbname = "contatos"; // Nome do banco de dados

// Cria a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se ocorreu algum erro na conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

?>

