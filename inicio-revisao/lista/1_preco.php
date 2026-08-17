<?php

$preco = 50.00;
$quantidade = 5;

$valorTotal = $preco * $quantidade;

if ($valorTotal >= 200) {
    $desconto = $valorTotal * 0.10;
    $valorFinal = $valorTotal - $desconto;
} else {
    $valorFinal = $valorTotal;
}

echo "Preço do produto: R$ " . number_format($preco, 2, ',', '.') . PHP_EOL;
echo "Quantidade: " . $quantidade . PHP_EOL;
echo "Valor total: R$ " . number_format($valorTotal, 2, ',', '.') . PHP_EOL;
echo "Valor final: R$ " . number_format($valorFinal, 2, ',', '.') . PHP_EOL;

?>