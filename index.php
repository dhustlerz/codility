<?php
function solution($A) {
    $rightSum = array_sum($A);
    $leftSum = 0;
    for ($i = 0; $i < count($A); $i++) {
        if (isset($A[$i-1])) {
          $leftSum += $A[$i-1];
        }
        $rightSum -= $A[$i];
        if ($leftSum == $rightSum) {
           return $i;
        }
    }
    return -1;
}

class EquiTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @dataProvider provider
   */
  public function testEqui($A, $acceptable_results) {
    $this->assertTrue(in_array(equi($A), $acceptable_results));
  }
    
  public function provider() {
    return array(
      array(array(-7, 1, 5, 2, -4, 3, 0), array(3, 6)),
      array(array(3, 2, 1, -6, 0), array(4)),
      array(array(0, 3, 2, 1, -6), array(0)),
      array(array(1, 2, 3, 4, 5, 6), array(-1))
    );
  }
}