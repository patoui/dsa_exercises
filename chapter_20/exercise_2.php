<?php

function missingNumber(array $integers): int
{
        $num_map = range(0, count($integers) - 1);

        for ($i = 0; $i < count($integers) - 1; $i++) {
                unset($num_map[$integers[$i]]);
        }

        return current($num_map);
}

echo missingNumber([2,3,0,6,1,5]) . PHP_EOL;
echo missingNumber([8,2,3,9,4,7,5,0,6]) . PHP_EOL;
echo missingNumber([4,3,2,1]) . PHP_EOL;
echo missingNumber([0,1,2,4]) . PHP_EOL;

