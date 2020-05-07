class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function maxArea($height) {
         if (empty($height)) {
            return 0;
        }

        $max = 0;
        $i = 0;
        $j = count($height) - 1;

        while ($i<$j) {
            $max = max($max, ($j-$i)*min($height[$i], $height[$j]));
            if ($height[$i] < $height[$j]) {
                $i++;
            } else {
                $j--;
            }
        }
        return $max;
    }
}
