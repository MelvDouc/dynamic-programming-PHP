<?php

// Given a number n, return the nth number of the Fibonacci sequence.

function fib_recurse($n, &$memo = [])
{
  if (array_key_exists($n, $memo))
    return $memo[$n];
  if ($n <= 2)
    return 1;
  $memo[$n] = fib_recurse($n - 1, $memo) + fib_recurse($n - 2, $memo);
  return $memo[$n];
}

function fib_tab($n)
{
  $table = array_fill(0, $n + 1, 0);
  $table[1] = 1;
  for ($i = 0; $i <= $n; $i++)
    for ($j = 1; $j <= 2; $j++)
      if ($i + $j < $n + 1)
        $table[$i + $j] += $table[$i];
  return $table[$n];
}
