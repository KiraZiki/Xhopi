<?php
require_once('includes/functions.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
    $telefone = $_POST['telefone'];
    $endereco = $_POST['endereco'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $cep = $_POST['cep'];

    // Verifica se o email já está cadastrado
    if (emailExiste($email)) {
        $erro = "Este e-mail já está cadastrado.";
    } else {
        // Tenta cadastrar o cliente
        if (cadastrarCliente($nome, $email, $senha, $telefone, $endereco, $cidade, $estado, $cep)) {
            // Redireciona para a página de login após o cadastro
            header('Location: login.php');
            exit;
        } else {
            $erro = "Erro ao cadastrar cliente. Por favor, tente novamente.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente - <?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php include('includes/header.php'); ?>
    
    <div class="container">
        <h2>Cadastro de Cliente</h2>
        <?php if (isset($erro)) : ?>
            <div class="alert alert-danger"><?php echo $erro; ?></div>
        <?php endif; ?>
        <form method="post">
            <div class="form-group">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>
            </div>
            <div class="form-group">
                <label for="email">E-mail:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" required>
            </div>
            <div class="form-group">
                <label for="telefone">Telefone:</label>
                <input type="tel" id="telefone" name="telefone">
            </div>
            <div class="form-group">
                <label for="endereco">Endereço:</label>
                <input type="text" id="endereco" name="endereco">
            </div>
            <div class="form-group">
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade">
            </div>
            <div class="form-group">
                <label for="estado">Estado:</label>
                <input type="text" id="estado" name="estado">
            </div>
            <div class="form-group">
                <label for="cep">CEP:</label>
                <input type="text" id="cep" name="cep">
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>

    <?php include('includes/footer.php'); ?>
</body>
</html>
