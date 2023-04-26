<?php

function missingNumber(array $integers): int
{
        $num_map = range(0, count($integers) - 1);

        for ($i = 0; $i < count($integers) - 1; $i++) {
                unset($num_map[$integers[$i]]);
        }

        return current($num_map);
}

function missingNumberAlt(array $integers): int
{
        $full_sum = 0;
        foreach (range(1, count($integers)) as $i) {
                $full_sum += $i;
        }

        $current_sum = 0;
        foreach ($integers as $num) {
                $current_sum += $num;
        }

        return $full_sum - $current_sum;
}

echo missingNumber([2,3,0,6,1,5]) . PHP_EOL;
echo missingNumber([8,2,3,9,4,7,5,0,6]) . PHP_EOL;
echo missingNumber([4,3,2,1]) . PHP_EOL;
echo missingNumber([0,1,2,4]) . PHP_EOL;

echo missingNumberAlt([2,3,0,6,1,5]) . PHP_EOL;
echo missingNumberAlt([8,2,3,9,4,7,5,0,6]) . PHP_EOL;
echo missingNumberAlt([4,3,2,1]) . PHP_EOL;
echo missingNumberAlt([0,1,2,4]) . PHP_EOL;

