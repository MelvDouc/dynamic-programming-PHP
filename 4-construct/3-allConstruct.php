<?php

namespace WordFunctions;

// Write a function allConstruct(target, wordBank) that accepts a target string and an array of strings.
// The function should return a 2D array containing *all of the ways*
// that the target can be constructed by concatenating elements of the wordBank array. 
// Each element of the 2D array should represent one combination that constructs the target.
// You may reuse elements of wordBank as many times as needed.

function allConstruct_recurse($target, $wordBank, &$memo = [])
{
  if (array_key_exists($target, $memo))
    return $memo[$target];
  if ($target === "")
    return [[]];

  $result = [];

  foreach ($wordBank as $word) {
    if (strpos($target, $word) !== 0)
      continue;
    $suffix = substr($target, strlen($word));
    $suffixWays = allConstruct_recurse($suffix, $wordBank, $memo);
    $targetWays = $suffixWays;
    foreach ($targetWays as &$way)
      array_unshift($way, $word);
    array_push($result, ...$targetWays);
  }

  return $memo[$target] = $result;
}

function allConstruct_tab($target, $wordBank)
{
  $table = array_fill(0, strlen($target) + 1, []);
  $table[0] = [[]];

  for ($i = 0; $i <= strlen($target); $i++)
    foreach ($wordBank as $word) {
      if (substr($target, $i, strlen($word)) !== $word)
        continue;
      $newCombinations = $table[$i];
      foreach ($newCombinations as &$subarray)
        array_push($subarray, $word);
      array_push($table[$i + strlen($word)], ...$newCombinations);
    }

  return $table[strlen($target)];
}
