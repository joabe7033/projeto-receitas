<?php
function cadastrar_receita($nome, $categoria, $imagem, $ingredientes, $preparo) {
    if ($nome && $categoria && $imagem) {
        $novaReceita = [
            'nome' => $nome,
            'categoria' => $categoria,
            'imagem' => $imagem,
            'ingredientes' => $ingredientes,
            'preparo' => $preparo
        ];

        $_SESSION['receitas'][] = $novaReceita;
        return "<p style='color: green;'>Receita cadastrada com sucesso!</p>";
    } else {
        return "<p style='color: red;'>Preencha todos os campos.</p>";
    }
}
