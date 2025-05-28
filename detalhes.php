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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Catálogo de Receitas</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body class="bg-light py-4" style="font-family: Arial, sans-serif;">

    <div class="container">
        <div class="card mx-auto shadow" style="max-width: 500px;">
            <img src="<?php echo $receita['imagem']; ?>" alt="<?php echo $receita['nome']; ?>" class="card-img-top rounded-top">

            <div class="card-body">
                <h2 class="card-title text-center mb-3"><?php echo $receita['nome']; ?></h2>
                <p class="text-center"><strong>Categoria:</strong> <?php echo $receita['categoria']; ?></p>

                <hr>

                <div class="mb-3">
                    <p><strong>Ingredientes:</strong><br>
                        <span style="white-space: pre-line;"><?php echo ($receita['ingredientes']); ?></span>
                    </p>
                </div>

                <div>
                    <p><strong>Modo de preparo:</strong><br>
                        <span style="white-space: pre-line;"><?php echo nl2br($receita['preparo']); ?></span>
                    </p>
                </div>

                <a href="index.php" class="btn btn-secondary d-block mx-auto mt-4" style="max-width: 100px;">Voltar</a>


        </div>
    </div>
</body>


</body>
</html>
