<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @param Integer $target
     * @return Integer[]
     */
    function twoSum($nums, $target) {
        if (empty($nums) || count($nums) < 2) {
            return [];
        }
        $count = count($nums);
        for ($i = 0; $i < $count - 1; $i++) {
            for ($j = $i+1;$j<$count;$j++) {
                if ($nums[$i] + $nums[$j] == $target) {
                    return [$i, $j];
                }
            }
        }
    }

}
