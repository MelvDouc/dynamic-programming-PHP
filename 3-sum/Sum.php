<?php

include "1-canSum.php";
include "2-howSum.php";
include "3-bestSum.php";

use SumFunctions as SF;

class Sum
{
  private $targetSum;
  private $numbers;

  public function __construct(int $targetSum, array $numbers)
  {
    $this->targetSum = $targetSum;
    $this->numbers = $numbers;
  }

  private function stringify($result)
  {
    echo json_encode($result) . "\n";
  }

  public function canSum_recurse()
  {
    $this->stringify(SF\canSum_recurse($this->targetSum, $this->numbers));
  }

  public function canSum_tab()
  {
    $this->stringify(SF\canSum_tab($this->targetSum, $this->numbers));
  }

  public function howSum_recurse()
  {
    $this->stringify(SF\howSum_recurse($this->targetSum, $this->numbers));
  }

  public function howSum_tab()
  {
    $this->stringify(SF\howSum_tab($this->targetSum, $this->numbers));
  }

  public function bestSum_recurse()
  {
    $this->stringify(SF\bestSum_recurse($this->targetSum, $this->numbers));
  }

  public function bestSum_tab()
  {
    $this->stringify(SF\bestSum_tab($this->targetSum, $this->numbers));
  }
}

$sum1 = new Sum(7, [2, 3]);
$sum2 = new Sum(7, [5, 3, 4, 7]);
$sum3 = new Sum(7, [2, 4]);
$sum4 = new Sum(8, [2, 3, 5]);
$sum5 = new Sum(300, [7, 14]);
$sums = [$sum1, $sum2, $sum3, $sum4, $sum5];

foreach ($sums as $sum) {
  // $sum->canSum_recurse();
  // $sum->howSum_recurse();
  // $sum->bestSum_recurse();
  // $sum->canSum_tab();
  // $sum->howSum_tab();
  // $sum->bestSum_tab();
}
