<?php
/**
In a room there are N ropes and N weights. Each rope is connected to exactly one weight (at just one end), and each rope has a particular durability − the maximum weight that it can suspend.

There is also a hook, attached to the ceiling. The ropes can be attached to the hook by tying the end without the weight. The ropes can also be attached to other weights; that is, the ropes and weights can be attached to one another in a chain. A rope will break if the sum of weights connected to it, directly or indirectly, is greater than its durability.

We know the order in which we want to attach N ropes. More precisely, we know the parameters of the rope (durability and weight) and the position of each attachment. Durabilities, weights and positions are given in three zero-indexed arrays A, B, C of lengths N. For each I (0 ≤ I < N):

A[I] is the durability of the I-th rope,
B[I] is the weight connected to the I-th rope,
C[I] (such that C[I] < I) is the position to which we attach the I-th rope; if C[I] equals −1 we attach to the hook, otherwise we attach to the weight connected to the C[I]-th rope.
The goal is to find the maximum number of ropes that can be attached in the specified order without breaking any of the ropes.

Write a function:

function solution($A, $B, $C);

that, given three zero-indexed arrays A, B, C of N integers, returns the maximum number of ropes that can be attached in a given order.

For example, given the following arrays:

    A[0] = 5    B[0] = 2    C[0] = -1
    A[1] = 3    B[1] = 3    C[1] = 0
    A[2] = 6    B[2] = 1    C[2] = -1
    A[3] = 3    B[3] = 1    C[3] = 0
    A[4] = 3    B[4] = 2    C[4] = 3


the function should return 3, as if we attach a fourth rope then one rope will break, because the sum of weights is greater than its durability (2 + 3 + 1 = 6 and 6 > 5).

Given the following arrays:

    A[0] = 4    B[0] = 2    C[0] = -1
    A[1] = 3    B[1] = 2    C[1] = 0
    A[2] = 1    B[2] = 1    C[2] = 1


the function should return 2, as if we attach a third rope then one rope will break, because the sum of weights is greater than its durability (2 + 2 + 1 = 5 and 5 > 4).

Assume that:

N is an integer within the range [0..100,000];
each element of array A is an integer within the range [1..1,000,000];
each element of array B is an integer within the range [1..5,000];
each element of array C is an integer such that −1 ≤ C[I] < I, for each I (0 ≤ I < N).
Complexity:

expected worst-case time complexity is O(N*log(N));
expected worst-case space complexity is O(N), beyond input storage (not counting the storage required for input arguments).
Elements of input arrays can be modified.
 * 
 * 
********************************************************************************	
Task score    87 / 100
SILVE AWARD
https://codility.com/cert/view/cert25S6FQ-2TUTKZECJHZ8MN2M
********************************************************************************
 */
function solution($A, $B, $C) {
    $D = array();
    for ($i = 0; $i < count($A); $i++) {
        $D[$i] = $A[$i] - $B[$i];
        if ($D[$i] < 0) {
            return $i;
        }
        $number = $C[$i];
        if ($number != -1) {
            do {
                $D[$number] -= $B[$i];
                if ($D[$number] < 0) {
                    return $i;
                }
                $number = $C[$number];
            } while ($number != -1);
        }
    }
    return count($A);
}

class SulphurTest extends PHPUnit_Framework_TestCase {
  
  /**
   * @dataProvider provider
   */
  public function testSulphur($A, $acceptable_results) {
    $this->assertTrue(in_array(sculpur($A), sculpur($B), sculpur($C), $acceptable_results));
  }
    
  public function provider() {
    return array(
      array(array(5, 3, 6, 3, 3), array(2, 3, 1, 1, 2), array(-1, 0, -1, 0, 3), array(3)),
      array(array(4, 3, 1), array(2, 2, 1), array(-1, 0, 1), array(2))
    );
  }
}