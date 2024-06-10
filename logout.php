<?php
require_once('includes/functions.php');

// Encerra a sessão do cliente
logoutCliente();

// Redireciona para a página de login
header('Location: login.php');
exit;
?>
