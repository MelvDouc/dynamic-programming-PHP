<?php

include "1-canConstruct.php";
include "2-countConstruct.php";
include "3-allConstruct.php";

use WordFunctions as WF;

class Word
{
  private $target;
  private $wordBank;

  public function __construct(string $target, array $wordBank)
  {
    $this->target = $target;
    $this->wordBank = $wordBank;
  }

  private function stringify($result)
  {
    echo json_encode($result) . "\n";
  }

  public function canConstruct_recurse()
  {
    $this->stringify(WF\canConstruct_recurse($this->target, $this->wordBank));
  }

  public function canConstruct_tab()
  {
    $this->stringify(WF\canConstruct_tab($this->target, $this->wordBank));
  }

  public function countConstruct_recurse()
  {
    $this->stringify(WF\countConstruct_recurse($this->target, $this->wordBank));
  }

  public function countConstruct_tab()
  {
    $this->stringify(WF\countConstruct_tab($this->target, $this->wordBank));
  }

  public function allConstruct_recurse()
  {
    $this->stringify(WF\allConstruct_recurse($this->target, $this->wordBank));
  }

  public function allConstruct_tab()
  {
    $this->stringify(WF\allConstruct_tab($this->target, $this->wordBank));
  }
}

$word1 = new Word("purple", ["purp", "p", "ur", "le", "purpl"]);
$word2 = new Word("abcdef", ["ab", "abc", "cd", "def", "abcd"]);
$word3 = new Word("skateboard", ["bo", "rd", "ate", "t", "ska", "sk", "boar"]);
$word4 = new Word("enterapotentpot", ["a", "p", "ent", "enter", "ot", "o", "t"]);
$word5 = new Word("eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeef", [
  "e",
  "ee",
  "eee",
  "eeee",
  "eeeee",
  "eeeeee",
]);
$words = [$word1, $word2, $word3, $word4, $word5];

foreach ($words as $word) {
  // $word->canConstruct_recurse();
  // $word->countConstruct_recurse();
  $word->allConstruct_recurse();
  // $word->canConstruct_tab();
  // $word->countConstruct_tab();
  $word->allConstruct_tab();
}
