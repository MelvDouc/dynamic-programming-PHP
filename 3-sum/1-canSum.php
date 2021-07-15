<?php

namespace SumFunctions;


// Write a function canSum(targetSum, numbers) that takes in a target sum and an array of numbers.
// The function should return a boolean indicating whether it is to possible
// to generate the target sum using the numbers from the array.
// You may use an element from the array as many times as needed.
// You may assume the all input numbers are nonnegative.

function canSum_recurse($targetSum, $numbers, &$memo = [])
{
  if (array_key_exists($targetSum, $memo))
    return $memo[$targetSum];
  if ($targetSum === 0)
    return 1;
  if ($targetSum < 0)
    return 0;

  foreach ($numbers as $number) {
    $remainder = $targetSum - $number;
    if (!canSum_recurse($remainder, $numbers, $memo))
      continue;
    return $memo[$targetSum] = 1;
  }

  return $memo[$targetSum] = 0;
}

function canSum_tab($targetSum, $numbers)
{
  $table = array_fill(0, $targetSum + 1, 0);
  $table[0] = 1;

  for ($i = 0; $i <= $targetSum; $i++) {
    if ($table[$i] !== 1)
      continue;
    foreach ($numbers as $number)
      $table[$i + $number] = 1;
  }

  return $table[$targetSum];
}
