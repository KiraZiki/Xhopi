<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo SITE_NAME; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php if (clienteLogado()) : ?>
                    <li><a href="dashboard.php">Painel do Cliente</a></li>
                    <li><a href="logout.php">Sair</a></li>
                <?php else : ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="register.php">Cadastro</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>

    <main>
