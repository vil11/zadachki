<?php

//написать метод, который возвращает максимальное из двух чисел, не используя какие-либо операторы сравнения.

$pairs = array (
    array(-4, -8),
    array(-3, 0),
    array(-2, 15),
    array(0, 0),
    array(0, 2),
    array(3, 15),
);

foreach ($pairs as $pair) {
    $max = findMax($pair[0], $pair[1]);
    echo $pair[0] . ', ' . $pair[1] . ': MAX = ' . $max . "\n";

    $max = findMax($pair[1], $pair[0]);
    echo $pair[1] . ', ' . $pair[0] . ': MAX = ' . $max . "\n";
}

function findMax($a, $b)
{
    $diff = abs($a - $b);
    $sum = $a + $b;

    return $sum - ($sum - $diff) / 2;
}
