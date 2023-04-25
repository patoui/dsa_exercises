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

function reverseAlt(array $data): array {
        for ($i = 0; $i < count($data) / 2; $i++) {
                $temp = $data[count($data) - 1 - $i];
                $data[count($data) - 1 - $i] = $data[$i];
                $data[$i] = $temp;
        }

        return $data;
}

print_r(reverse([1,2,3,4,5,6,7]));
print_r(reverseAlt([1,2,3,4,5,6,7]));

