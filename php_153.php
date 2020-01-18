<?php

/**
 * There are numbers, which product consists from the same digits that multipliers are.
 * Example: 51*3 = 153.
 *
 * Write script, which for given N (N must be defined in source code as constant) shows
 * only the following information:
 *  - Amount of such numbers for unique pair of multipliers, where each multiplier is in range between 1 and N;
 *  - Maximum product, and multipliers for such product.
 */

define('N', 100);

function verifyTheRangeMulti($n, $echo = 1)
{
    $amount = 0;
    $max = 0;
    for ($i = 1; $i <= $n; $i++) {
        for ($j = $i; $j <= $n; $j++) {
            $product = $i * $j;
            $a = array_merge(convert((string)$i), convert((string)$j));
            $b = convert((string)$product);
            if (count($a) == count($b)) {
                if (array_diff($a, $b) == null && array_diff($b, $a) == null) {
                    if (exactComparing($a, $b) && (exactComparing($b, $a))) {
                        $amount++;
                        if ($echo) {
                            echo "$i * $j = $product<br>";
                        }
                        $max = maxProduct($max, $product);
                    }
                }
            }
        }
    }
    echo "<br>amount of pairs = <b>" . $amount . "</b><br> max product is <b>" . $max . "</b><br>";
}

function convert($str)
{
    $arr = array();
    for ($i = 0; $i < strlen($str); $i++) {
        $arr[$i] = $str[$i];
    }
    return $arr;
}

function exactComparing($a, $b)
{
    $a = sorting($a);
    $b = sorting($b);
    for ($i = 0; $i < count($a); $i++) {
        if ($a[$i] != $b[$i]) {
            return false;
        }
    }
    return true;
}

function sorting($arr)
{
    asort($arr);
    foreach ($arr as $elem) {
        $res[] = $elem;
    }
    return $res;
}

function maxProduct($max, $product)
{
    if ($product > $max) {
        $max = $product;
    }
    return $max;
}

verifyTheRangeMulti(N);
