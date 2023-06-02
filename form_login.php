<?php

session_start();

// Verificar se já existe uma sessão iniciada
if (isset($_SESSION['admin_username'])) {
    // Redirecionar para a página de admin
    header('Location: admin_area.php');
    exit();
}

//Verificar se houve erro de login
if (isset($_GET['error']) && $_GET['error'] == 'login_required') {
    $error_message = 'Você deve fazer login primeiro.';
}

// Verificar se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    require 'connection.php';

    // Obter os dados do formulário
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Consulta SQL para verificar as credenciais do usuário
    $sql = "SELECT * FROM usuarios WHERE nome = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        $stored_password = $row['senha'];

        // Verificar se a senha fornecida é válida
        if (password_verify($password, $stored_password)) {
            // Credenciais válidas, iniciar a sessão do administrador
            $_SESSION['admin_username'] = $username;
            header('Location: admin_area.php');  // redirecionar para a página inicial do admin
            exit();
        }
    }

    

    // Credenciais inválidas, exibir mensagem de erro
    $error_message = 'Nome de usuário ou senha incorretos.';

    // Fechar a conexão com o banco de dados
    $conn->close();

}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="form_login.php">
        <label for="username">Nome de usuário:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>