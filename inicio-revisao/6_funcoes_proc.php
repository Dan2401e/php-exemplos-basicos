<?php

// Função simples com retorno
function somar(int $a, int $b): int {
    return $a + $b;
}

// Exibindo o resultado da função
echo somar(4, 10);
echo "<br>";

// Procedimento (Função sem retorno)
function saudacao($nome = "aluno") {
    echo "Olá, $nome! Seja bem-vindo ao PHP!.
    <br>";
}

// Exibindo a saudação
saudacao();
saudacao("Daniel");

function mostrarlinha() {
    echo "----------------------------------------<br>";
}

mostrarlinha();