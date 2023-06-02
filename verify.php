<?php
session_start();

// Verificar se o usuário não está logado
if (!isset($_SESSION['admin_username'])) {
    // Redirecionar para uma página de aviso ou exibir uma mensagem na página atual
    header('Location: form_login.php?error=login_required');
    exit();
}