<?php

// Say you're a traveler on a 2D grid.
// You begin in the top-left corner and your goal is to travel to the bottom-right corner.
// You may only move down or right.
// In how many ways can you travel to the goal on a grid with dimensions m * n?

function gridTraveler_recurse($m, $n, &$memo = [])
{
  $key = "$m,$n";

  if (array_key_exists($key, $memo))
    return $memo[$key];
  if ($m === 1 && $n === 1)
    return 1;
  if ($m === 0 || $n === 0)
    return 0;

  $memo[$key] = gridTraveler_recurse($m - 1, $n, $memo) + gridTraveler_recurse($m, $n - 1, $memo);
  return $memo[$key];
}

function getGrid($m, $n)
{
  $nArray = array_fill(0, $n + 1, 0);
  $table = array_fill(0, $m + 1, $nArray);
  $table[1][1] = 1;

  for ($i = 0; $i <= $m; $i++)
    for ($j = 0; $j <= $n; $j++) {
      $current = $table[$i][$j];
      if ($i < $m)
        $table[$i + 1][$j] += $current;
      if ($j < $n)
        $table[$i][$j + 1] += $current;
    }

  return $table;
}

function gridTraveler_tab($m, $n)
{
  return getGrid($m, $n)[$m][$n];
}
