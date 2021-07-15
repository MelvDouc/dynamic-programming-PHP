<?php

namespace WordFunctions;

// Write a function canConstruct(target, wordBank) that accepts a target string and an array of strings.
// The function should return a boolean indicating
// whether or not the target can be constructed by concatenating elements of the wordBank array. 
// You may reuse elements of wordBank as many times as needed.

function canConstruct_recurse($target, $wordBank, &$memo = [])
{
  if (array_key_exists($target, $memo))
    return $memo[$target];
  if ($target === "")
    return 1;

  foreach ($wordBank as $word) {
    if (strpos($target, $word) !== 0)
      continue;
    $suffix = substr($target, strlen($word));
    if (canConstruct_recurse($suffix, $wordBank, $memo))
      return $memo[$target] = 1;
  }

  return $memo[$target] = 0;
}

function canConstruct_tab($target, $wordBank)
{
  $table = array_fill(0, strlen($target) + 1, 0);
  $table[0] = 1;

  for ($i = 0; $i <= strlen($target); $i++)
    if ($table[$i] === 1)
      foreach ($wordBank as $word)
        if (substr($target, $i, strlen($word)) === $word)
          $table[$i + strlen($word)] = 1;

  return $table[strlen($target)];
}
