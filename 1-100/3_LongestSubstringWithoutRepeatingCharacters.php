class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
           if (!$s) {
            return 0;
        }
        $strLength = strlen($s);
        if (1 == $strLength) {
            return 1;
        }

        $charMap = [];
        $max     = 0;

        for ($i = 0, $j = 0; $j < $strLength; $j++) {
            if (!empty($charMap) && in_array($s[$j], array_keys($charMap))) {
                $i = max($charMap[$s[$j]] + 1, $i);
            }
            $charMap[$s[$j]] = $j;
            $max             = max($max, $j - $i + 1);
        }

        return $max;
    }
}
