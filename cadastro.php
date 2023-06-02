<?php
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
</head>
<body>
    <h1>Cadastro de Administrador</h1>
    <?php if (isset($success_message)) : ?>
        <p><?php echo $success_message; ?></p>
    <?php endif; ?>
    <?php if (isset($error_message)) : ?>
        <p><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="username">Nome de usuário:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>