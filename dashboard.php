<?php
require_once('includes/functions.php');

// Verifica se o cliente está logado
if (!clienteLogado()) {
    header('Location: login.php');
    exit;
}

// Obtém informações do cliente
$clienteId = $_SESSION['cliente_id'];
$cliente = getClienteById($clienteId);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Cliente - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <div class="container">
        <h2>Painel do Cliente</h2>
        <p>Bem-vindo, <?php echo $cliente['nome']; ?>!</p>
        <p><a href="logout.php">Sair</a></p>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
