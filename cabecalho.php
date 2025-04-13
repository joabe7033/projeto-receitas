<?php
session_start();
$paginaAtual = basename($_SERVER['PHP_SELF']);
$titulo = '🍽️ Catálogo de Receitas';

if ($paginaAtual === 'protegido.php' && isset($_SESSION['usuario'])) {
    $titulo = 'Área Restrita - Cadastro de Receita';
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilo.css">
    <title>Catálogo de Receitas</title>
</head>
<body>
    <header>
        <br><br><br>
        <h1><?php echo $titulo; ?></h1>

        <nav>
            <a href="index.php">Início</a> |
            <a href="filtrar.php">Filtrar</a> |
            <?php if (isset($_SESSION['usuario'])): ?>
                <a href="protegido.php">Área Restrita</a> |
                <a href="logout.php">Logout </a>
            <?php else: ?>
                <a href="login.php">Login</a>
            <?php endif; ?>
        </nav>

        <br><hr>
    </header>
</body>
</html>
