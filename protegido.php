<?php
session_start();

require 'funcoes.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$erro = "";
$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $categoria = $_POST['categoria'] ?? '';
    $imagem = $_POST['imagem'] ?? '';
    $ingredientes = $_POST['ingredientes'] ?? '';
    $preparo = $_POST['preparo'] ?? '';

    $mensagem = cadastrar_receita($nome, $categoria, $imagem, $ingredientes, $preparo);
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Receitas</title>
    <link rel="stylesheet" href="css/estilo.css">

    <style>
        .formulario-receita {
            max-width: 90%;
            margin: 0 auto;
            text-align: left;
        }

        .formulario-receita label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .formulario-receita input,
        .formulario-receita select,
        .formulario-receita textarea {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            display: block;
        }

        .formulario-receita textarea {
            height: 150px;
            resize: vertical;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
        }

        .formulario-receita button[type="submit"] {
            display: block;
            margin: 0 auto;
        }

        .botoes-acoes {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<header>
    <?php include 'cabecalho.php'; ?>

    <?php if ($mensagem): ?>
        <div style="text-align: center;">
            <?php echo $mensagem; ?>
        </div>
    <?php endif; ?>
</header>

<form method="POST" action="protegido.php" class="formulario-receita">
    <label>Nome da Receita:</label>
    <input type="text" name="nome" required>

    <label>Categoria:</label>
    <select name="categoria" required>
        <option value="">Selecione</option>
        <option value="Doce">Doce</option>
        <option value="Salgado">Salgado</option>
        <option value="Fitness">Fitness</option>
    </select>

    <label>Ingredientes:</label>
    <textarea name="ingredientes" rows="5" required></textarea>

    <label>Modo de Preparo:</label>
    <textarea name="preparo" rows="5" required></textarea>

    <label>URL da Imagem:</label>
    <input type="text" name="imagem" required>

    <button type="submit">Cadastrar Receita</button>
</form>

<div class="botoes-acoes">
    <a href="index.php"><button>Voltar ao Catálogo</button></a>
    <a href="logout.php"><button>Sair</button></a>
</div>

</body>
</html>
