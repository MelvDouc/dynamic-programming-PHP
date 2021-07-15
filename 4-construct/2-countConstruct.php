<?php

namespace WordFunctions;

// Write a function countConstruct(target, wordBank) that accepts a target string and an array of strings.
// The function should return a number of ways
// that the target can be constructed by concatenating elements of the wordBank array. 
// You may reuse elements of wordBank as many times as needed.

function countConstruct_recurse($target, $wordBank, &$memo = [])
{
  if (array_key_exists($target, $memo))
    return $memo[$target];
  if ($target === "")
    return 1;

  $totalCount = 0;

  foreach ($wordBank as $word) {
    if (strpos($target, $word) !== 0)
      continue;
    $suffix = substr($target, strlen($word));
    $numWaysForRest = countConstruct_recurse($suffix, $wordBank, $memo);
    $totalCount += $numWaysForRest;
  }

  return $memo[$target] = $totalCount;
}

function countConstruct_tab($target, $wordBank)
{
  $table = array_fill(0, strlen($target) + 1, 0);
  $table[0] = 1;

  for ($i = 0; $i <= strlen($target); $i++)
    foreach ($wordBank as $word)
      if (substr($target, $i, strlen($word)) === $word)
        $table[$i + strlen($word)] += $table[$i];

  return $table[strlen($target)];
}
