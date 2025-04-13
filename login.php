<?php
session_start();

//$senha = '123';
//$senhaSegura = password_hash($senha, PASSWORD_DEFAULT, ['cost'=>12]);
//$senhaCorreta = password_verify($_POST['senha'], $senhaSegura); 
$hashSalva = '$2y$12$xn.042ozR5g5BD2/B28SsuDmogNol6oD3XyIIuOfTdkqE3k7k23Ou';

//var_dump($senhaSegura); 
//var_dump($senhaCorreta);

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if ($usuario === 'admin' && password_verify($senha, $hashSalva))  {
        $_SESSION['usuario'] = $usuario;
        header("Location: protegido.php");
        exit;
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Receitas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>

<?php include 'cabecalho.php'; ?>

<div class="login">
    <h2>Login</h2>

    <?php if ($erro): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>

    <form method="POST" action="login.php">
        <label>Usuário:</label><br>
        <input type="text" name="usuario" required><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" required><br><br>

        <button type="submit">Entrar</button>
    </form>
</div>

</body>
</html>
