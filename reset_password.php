<?php
require_once('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $novaSenha = $_POST['novaSenha'];

    if (redefinirSenha($email, $novaSenha)) {
        // Redefinição de senha bem-sucedida, redireciona para a página de login
        header('Location: login.php');
        exit;
    } else {
        $erro = "Erro ao redefinir senha. Por favor, tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redefinir Senha - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <div class="container">
        <h2>Redefinir Senha</h2>
        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="novaSenha">Nova Senha:</label>
                <input type="password" id="novaSenha" name="novaSenha" required>
            </div>
            <button type="submit">Enviar</button>
        </form>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
