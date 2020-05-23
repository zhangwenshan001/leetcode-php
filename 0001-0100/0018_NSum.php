<?php

class NSum
{

    function fourSum($nums, $target)
    {
        //不存在或个数<4时
        if (empty($nums) || count($nums) < 4) {
            return [];
        }

        sort($nums); //排序

        return $this->getNSum($nums, $target, 4);
    }

    function getNSum($nums, $target, $n)
    {
        if (!$n) {
            return null;
        }
        //如果nums个数少于n 则返回[]
        if (empty($nums) || count($nums) < $n) {
            return null;
        }

        if ($n == 1) {
            return in_array($target, $nums) ? [$target] : null;
        }

        $numCount = count($nums);

        if ($n == 2) {
            $i = 0;
            $j = $numCount - 1;

            $result = [];
            while ($i < $j) {
                $sum = $nums[$i] + $nums[$j];
                if ($sum == $target) {
                    $result[] = [$nums[$i], $nums[$j]];
                    $i++;
                    $j--;
                } elseif ($sum < $target) {
                    $i++;
                } else {
                    $j--;
                }
                while ($i < $j && $i > 0 && $nums[$i] == $nums[$i - 1]) {
                    $i++;
                }
                while ($i < $j && $j < $numCount && $nums[$j] == $nums[$j + 1]) {
                    $j--;
                }
            }

            return $result;
        }

        $i      = 0;
        $result = [];

        while ($i + 2 < $numCount) {
            $curNum = $nums[$i];

            $curTarget = $target - $curNum;
            $curArray  = array_slice($nums, $i + 1, $numCount - $i - 1);
            $newResult = $this->getNSum($curArray, $curTarget, $n - 1);
            if (!empty($newResult)) {
                foreach ($newResult as $item) {
                    array_unshift($item, $nums[$i]);
                    $result[] = $item;
                }
            }
            $i++;

            while ($nums[$i] == $nums[$i - 1] && $i +2 < $numCount) {
                $i++;
            }
        }
        return $result;

    }
}

var_dump((new NSum())->fourSum([-493,-482,-482,-456,-427,-405,-392,-385,-351,-269,-259,-251,-235,-235,-202,-201,-194,-189,-187,-186,-180,-177,-175,-156,-150,-147,-140,-122,-112,-112,-105,-98,-49,-38,-35,-34,-18,20,52,53,57,76,124,126,128,132,142,147,157,180,207,227,274,296,311,334,336,337,339,349,354,363,372,378,383,413,431,471,474,481,492], 6189));
