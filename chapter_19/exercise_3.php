<?php

function reverse(array $data): array {
        $left_index = 0;
        $right_index = count($data) - 1;

        while ($left_index < $right_index) {
                $temp = $data[$left_index];
                $data[$left_index] = $data[$right_index];
                $data[$right_index] = $temp;
                $left_index++;
                $right_index--;
        }

        return $data;
}

print_r(reverse([1,2,3,4,5,6,7]));

