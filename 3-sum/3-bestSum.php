<?php

namespace SumFunctions;

// Write a function bestSum(targetSum, numbers) that takes in a target sum and an array of numbers.
// The function should return an array containing the shortest combination of numbers that add up to exactly the target sum.
// If there is a tie for the shortest combination, you may return any of one the shortest.

function bestSum_recurse($targetSum, $numbers, &$memo = [])
{
  if (array_key_exists($targetSum, $memo))
    return $memo[$targetSum];
  if ($targetSum === 0)
    return [];
  if ($targetSum < 0)
    return null;

  $shortestCombination = null;

  foreach ($numbers as $number) {
    $remainder = $targetSum - $number;
    $remainderCombination = bestSum_recurse($remainder, $numbers, $memo);
    if (is_null($remainderCombination))
      continue;
    $combination = array_merge($remainderCombination, [$number]);
    if (is_null($shortestCombination) || count($remainderCombination) < count($shortestCombination))
      $shortestCombination = $combination;
  }

  return $memo[$targetSum] = $shortestCombination;
}

function bestSum_tab($targetSum, $numbers)
{
  $table = array_fill(0, $targetSum + 1, null);
  $table[0] = [];

  for ($i = 0; $i <= $targetSum; $i++)
    if (!is_null($table[$i]))
      foreach ($numbers as $number) {
        $offset = $i + $number;
        if ($offset > $targetSum)
          continue;
        $combination = array_merge($table[$i], [$number]);
        if (is_null($table[$offset]) || count($table[$offset]) > count($combination))
          $table[$offset] = $combination;
      }

  return $table[$targetSum];
}
