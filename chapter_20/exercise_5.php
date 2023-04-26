<?php

function sortTemperatures(array $temps): array
{
        $map = [
                '97' => [],
                '98' => [],
                '99' => [],
        ];

        for ($i = 0; $i < count($temps); $i++) {
                $parts = explode('.', (string) $temps[$i]);
                $num = $parts[0];
                $dec = $parts[1] ?? '0';

                if (!isset($map[$num][$dec])) {
                        $map[$num][$dec] = 1;
                } else {
                        $map[$num][$dec]++;
                }
        }

        $sorted = [];
        foreach ($map as $temp => $decs) {
                for ($i = 0; $i < 10; $i++) {
                        if (isset($decs[$i])) {
                                for ($j = 0; $j < $decs[$i]; $j++) {
                                        $sorted[] = (float) "{$temp}.{$i}";
                                }
                        }
                }
        }

        return $sorted;
}

print_r(sortTemperatures([98.6,98.0,97.1,99.0,98.9,97.8,98.5,98.2,98.0,97.1]));

