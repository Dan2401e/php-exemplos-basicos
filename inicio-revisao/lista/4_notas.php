<?php

$notas = [7.5, 8.0, 6.5, 9.0, 5.5];

$soma = 0;

foreach ($notas as $nota) {
    $soma += $nota;
}

$media = $soma / count($notas);
$maiorNota = max($notas);
$menorNota = min($notas);

echo "Média da turma: " . number_format($media, 2, ',', '.') . "<br>";
echo "Maior nota: " . number_format($maiorNota, 1, ',', '.') . "<br>";
echo "Menor nota: " . number_format($menorNota, 1, ',', '.') . "<br>";

?>