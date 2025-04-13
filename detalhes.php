<?php
session_start(); 
require 'dados.php';

$id = $_GET['id'] ?? null;

$receitasSessao = $_SESSION['receitas'] ?? [];
$todasReceitas = array_merge($receitas, $receitasSessao);

if (!isset($todasReceitas[$id])) {
    echo "<p>Receita não encontrada. <a href='index.php'>Voltar ao catálogo</a></p>";
    exit;
}

$receita = $todasReceitas[$id];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Receitas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body style="background-color: #f8f8f8; font-family: Arial, sans-serif; padding: 20px;">

    <div style="max-width: 500px; margin: 20px auto; padding: 15px; text-align: center; background-color: #fff; border: 1px solid #ccc; border-radius: 10px; box-shadow: 2px 2px 5px rgba(0,0,0,0.1);">
        <img src="<?php echo $receita['imagem']; ?>" alt="<?php echo $receita['nome']; ?>" style="width: 90%; max-width: 400px; height: auto; border-radius: 8px; margin-bottom: 10px;">
        
        <h2 style="margin-bottom: 10px;"><?php echo $receita['nome']; ?></h2>
        <p><strong>Categoria:</strong> <?php echo $receita['categoria']; ?></p>

        <hr style="margin: 20px 0;">

        <div style="text-align: left;">
            <p><strong>Ingredientes:</strong><br><span style="white-space: pre-line;"><?php echo ($receita['ingredientes']); ?></span></p>
            <br>
            <p><strong>Modo de preparo:</strong><br><span style="white-space: pre-line;"><?php echo nl2br($receita['preparo']); ?></span></p>
        </div>

        <a href="index.php"><button style="margin-top: 20px;">Voltar</button></a>
    </div>

</body>
</html>
