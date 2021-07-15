<?php

namespace SumFunctions;

// Write a function howSum(targetSum, numbers) that takes in a target sum and an array of numbers.
// The function should return an array of any combination of elements that add up to exactly the target sum.
// If there is no such combination, return null.
// If there are multiple combinations possible, you may return any single one.

function howSum_recurse($targetSum, $numbers, &$memo = [])
{
  if (array_key_exists($targetSum, $memo))
    return $memo[$targetSum];
  if ($targetSum === 0)
    return [];
  if ($targetSum < 0)
    return $memo[$targetSum] = null;

  foreach ($numbers as $number) {
    $remainder = $targetSum - $number;
    $remainderResult = howSum_recurse($remainder, $numbers, $memo);
    if (is_null($remainderResult))
      continue;
    return $memo[$targetSum] = array_merge($remainderResult, [$number]);
  }

  return $memo[$targetSum] = null;
}

function howSum_tab($targetSum, $numbers)
{
  $table = array_fill(0, $targetSum + 1, null);
  $table[0] = [];

  for ($i = 0; $i <= $targetSum; $i++)
    if (!is_null($table[$i]))
      foreach ($numbers as $number)
        $table[$i + $number] = array_merge($table[$i], [$number]);

  return $table[$targetSum];
}
