<?php

session_start();

require 'dados.php';
include 'cabecalho.php';

$receitasSessao = $_SESSION['receitas'] ?? [];
$todasReceitas = array_merge($receitas, $receitasSessao);
?>

<?php if (empty($todasReceitas)): ?>
    <p>Nenhuma receita cadastrada.</p>
<?php else: ?>
    <div class="catalogo">
        <?php foreach ($todasReceitas as $id => $receita): ?>
            <div class="receita" style="width: 18rem;">
                <img class="receita-img-top" src="<?php echo $receita['imagem']; ?>" alt="<?php echo $receita['nome']; ?>">
                <div class="receita-body"><br>
                    <h5 class="receita-title"><?php echo $receita['nome']; ?></h5>
                    <p class="receita-text">Categoria: <?php echo $receita['categoria']; ?></p>
                    <a href="detalhes.php?id=<?php echo $id; ?>" class="button">Ver mais</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Receitas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
</head>
</html>
