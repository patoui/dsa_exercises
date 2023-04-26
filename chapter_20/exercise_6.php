<?php

function longestSequence(array $nums): int
{
        $map = [];

        foreach ($nums as $num) {
                $map[$num] = true;
        }

        $longest = 0;
        foreach ($map as $num => $_) {
                $current_length = 0;
                $current_num = $num;
                $exist = true;
                while ($exist) {
                        $current_length++;
                        $current_num++;
                        $exist = isset($map[$current_num]);
                }

                if ($current_length > $longest) {
                        $longest = $current_length;
                }
        }

        return $longest;
}

echo longestSequence([10,5,12,3,55,30,4,11,2]) . PHP_EOL;
echo longestSequence([19,13,15,12,18,14,17,11]) . PHP_EOL;

