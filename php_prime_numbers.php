<?php

/**
 * Create function, which for given array with the range of integers returns the array with only prime numbers.
 * (Prime - natural number greater than 1 that has no positive divisors other than 1 and itself).
 */

define('N', 1000);
for ($i = 0; $i <= N; $i++) {
    $a[] = $i;
}
$a = array(-2, 1.5, $a);

function detectPrimes($arr)
{
    foreach ($arr as $val) {
        if (is_array($val)) {
            $primes = detectPrimes($val);
        }
        if (isPrime($val)) {
            $primes[] = $val;
        }
    }
    return $primes;
}

function isPrime($val)
{
    if ($val <= 1 || !is_int($val)) {
        return false;
    }
    for ($i = 2; $i < $val; $i++) {
        if (is_int($val / $i)) {
            return false;
        }
    }
    return true;
}

var_dump(detectPrimes($a));