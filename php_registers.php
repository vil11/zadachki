<?php

/**
 * There are 3 registers. One of them has some integer value X, which is > 0. You don't know the others.
 * You can perform next manipulations:
 *  - reset the value of any register to 0;
 *  - increment the value of any register by 1;
 *  - assign the value of any register to any other register;
 *  - execute some cycle for N times, where N - value of the register.
 *
 * Get (X-1) in any register.
 */

$r1 = 8;
$r2 = 0;
$r3 = 0;

// solution 1
function solution1($r1, $r2, $r3)
{
    for ($i = 0; $i < $r1; $i++) {
        $r3 = 0;
        for ($j = 0; $j < $r2; $j++) {
            $r3++;
        }
        $r2++;
    }
    return $r3;
}

// solution 2
function solution2($r1, $r2, $r3)
{
    for ($i = 0; $i < $r1; $i++) {
        for ($j = 0; $j < $r2; $j++) {
            $r3++;
        }
        $r2 = 0;
        $r2++;
    }
    return $r3;
}