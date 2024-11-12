<?php
    $respostasCorretas = [
        'q1' => 'Amazônia',
        'q2' => 'Pantanal',
        'q3' => 'Caatinga',
        'q4' => 'Urbanização',
        'q5' => 'Gramíneas'
    ];

    $pontuacao = 0;

    foreach ($respostasCorretas as $pergunta => $respostaCorreta) {
        if (isset($_POST[$pergunta]) && $_POST[$pergunta] == $respostaCorreta) {
            $pontuacao++;
        }
    }

    include '../layout/head.php';
    include '../layout/cabecalho.php';

    echo "<h1>Resultado do Quiz</h1>";
    echo "<p>Você acertou <strong>$pontuacao</strong> de <strong>" . count($respostasCorretas) . "</strong> perguntas.</p>";

    if ($pontuacao == count($respostasCorretas)) {
        echo "<p>Parabéns! Você conhece muito sobre os biomas brasileiros!</p>";
    } elseif ($pontuacao >= 3) {
        echo "<p>Bom trabalho! Você tem um bom conhecimento sobre os biomas brasileiros.</p>";
    } else {
        echo "<p>Estude mais sobre os biomas brasileiros e tente novamente!</p>";
    }


    echo '<br>';
    echo '<a href="quiz.php"><button style="padding: 10px 15px; background-color: #007BFF; color: white; border: none; border-radius: 5px; cursor: pointer;">Voltar ao Quiz</button></a>';
?>
