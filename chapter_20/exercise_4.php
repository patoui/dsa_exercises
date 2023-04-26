<?php

function maxProduct(array $nums): int {
        $min_1 = PHP_INT_MAX;
        $min_2 = PHP_INT_MAX;
        $max_1 = PHP_INT_MIN;
        $max_2 = PHP_INT_MIN;

        foreach ($nums as $num) {
                if ($num > $max_1) {
                        $max_2 = $max_1;
                        $max_1 = $num;
                } elseif ($num > $max_2) {
                        $max_2 = $num;
                }

                if ($num < 0) {
                        if ($num < $min_1) {
                                $min_2 = $max_1;
                                $min_1 = $num;
                        } elseif ($num < $min_2) {
                                $min_2 = $num;
                        }
                }
        }

        $min_prod = $min_1 * $min_2;
        $max_prod = $max_1 * $max_2;

        return $min_prod > $max_prod ? $min_prod : $max_prod;
}

var_dump(maxProduct([5,-10,-6,9,4]));

