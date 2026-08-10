<?php

// Vetor (Array simples - "1 Linha")
$frutas = ["Banana", "Maçã", "Uva"];

// Exibindo os valores com laço
foreach ($frutas as $indice => $fruta) {
    echo "Posição: $indice - Valor: $fruta <br>";
}
// Array (Linhas e colunas)

$matriz = [
    ["Max Vestarppen", "Oscar Iastri", "Lando Norris"],
    ["Lewis Hamilton", "George Russell", "Valtteri Bottas"],
    ["Charles Leclerc", "Carlos Sainz", "Sergio Pérez"],
    ["Fernando Alonso", "Esteban Ocon", "Pierre Gasly"]
];

echo "<br><br>";
echo "Lista de pilotos de F1 (Dica o 1º é o melhor.) <br><br>";

// Exibindo os valores de matriz
foreach ($matriz as $linha) {
    foreach ($linha as $piloto) {
        echo $piloto . " | ";
    }
    echo "<br>";
}