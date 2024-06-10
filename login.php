<?php
require_once('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (fazerLogin($email, $senha)) {
        // Login bem-sucedido, redireciona para a página inicial
        header('Location: index.php');
        exit;
    } else {
        $erro = "Email ou senha incorretos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <button type="submit">Entrar</button>
        </form>
        <p><a href="reset_password.php">Esqueci minha senha</a></p>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
