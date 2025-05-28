<?php
session_start();

include 'cabecalho.php';
require 'dados.php';

$categoria = $_GET['categoria'] ?? '';
$receitasSessao = $_SESSION['receitas'] ?? [];
$todasReceitas = array_merge($receitas, $receitasSessao);

$receitasFiltradas = [];

if ($categoria) {
    foreach ($todasReceitas as $id => $receita) {
        if (strcasecmp($receita['categoria'], $categoria) === 0) {
            $receitasFiltradas[$id] = $receita;
        }
    }
} else {
    $receitasFiltradas = $todasReceitas;
}
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
<body>

    <form method="GET" action="filtrar.php">
        <label for="categoria">Escolha uma categoria:</label>
        <select name="categoria" id="categoria">
            <option value="">Todas</option>
            <option value="Doce" <?php if ($categoria == 'Doce') echo 'selected'; ?>>Doce</option>
            <option value="Salgado" <?php if ($categoria == 'Salgado') echo 'selected'; ?>>Salgado</option>
            <option value="Fitness" <?php if ($categoria == 'Fitness') echo 'selected'; ?>>Fitness</option>
        </select>
        <button type="submit" style="background-color: #2c3e50; color: white; border: none; padding: 8px 16px; border-radius: 5px; cursor: pointer;">Filtrar</button>
    </form>
    <br>

    <?php if (empty($receitasFiltradas)): ?>
        <p>Nenhuma receita encontrada para esta categoria.</p>
    <?php else: ?>
        <div class="catalogo">
            <?php foreach ($receitasFiltradas as $id => $receita): ?>
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

    <div style="display: flex; justify-content: center; margin-top: 20px;">
    <a href="index.php" style="text-decoration: none;">
        <button type="submit" style="background-color: transparent; color: #2c3e50; padding: 8px 16px; border: none; font-size: 16px; cursor: pointer;">
            ← Voltar ao Catálogo
        </button>
    </a>
</div>



</body>
</html>
