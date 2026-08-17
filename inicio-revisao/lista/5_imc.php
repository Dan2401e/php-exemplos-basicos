<?php

function calcularIMC($peso, $altura)
{
    $imc = $peso / ($altura * $altura);

    return $imc;
}

$peso = 70;
$altura = 1.75;

$imc = calcularIMC($peso, $altura);

echo "IMC: " . number_format($imc, 2, ',', '.') . "<br>";

if ($imc < 18.5) {
    echo "Classificação: Abaixo do peso";
} elseif ($imc < 25) {
    echo "Classificação: Peso normal";
} elseif ($imc < 30) {
    echo "Classificação: Sobrepeso";
} else {
    echo "Classificação: Obesidade";
}

?>