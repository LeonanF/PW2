<?php
session_start();

// Limpar todas as variáveis de sessão
$_SESSION = array();

// Destruir a sessão
session_destroy();

// Redirecionar para a página de login ou para uma página de confirmação de logout
header('Location: cadastro.php?logout=successful');
exit();
?>
