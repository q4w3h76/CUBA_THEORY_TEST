<?php

function distribute_discount(int $discount, array $prices): array
{
    // получаем сумму всех цен в корзине
    $sum_prices = array_sum($prices); 
    $discount_prices = [];
    foreach ($prices as $price) {
        // вычисляем отошение цены к сумме цен и умножаем на скидку
        $discount_prices[] = $price - ($price / $sum_prices) * $discount;
    }
    return $discount_prices;
}

// sum = 1550
$prices = [650, 300, 600]; 
$discount = 500;

$discount_prices = distribute_discount($discount, $prices);

// должен вернуть [ 440.32, 203.22, 406.45] sum = 1050
var_dump($discount_prices);
