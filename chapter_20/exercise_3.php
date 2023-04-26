<?php

function maximumStockProfit(array $prices): int
{
        $min = $prices[0];
        $min_idx = 0;
        $max = null;
        $max_idx = null;

        for ($i = 1; $i < count($prices); $i++) {
                $price = $prices[$i];
                $diff = $max - $min;
                if (
                        $price <= $min
                        && (!$max_idx || $i < $max_idx)
                        && ($max - $price) >= $diff
                ) {
                        $min = $price;
                        $min_idx = $i;
                } elseif (
                        $i > $min_idx
                        && ($price - $min) > $diff
                ) {
                        $max = $price;
                        $max_idx = $i;
                }
        }

        return $max - $min;
}

function maximumStockProfitAlt(array $prices): int
{
        $buy_price = $prices[0];
        $greatest_profit = 0;

        foreach ($prices as $price) {
                $potential_profit = $price - $buy_price;

                if ($price < $buy_price) {
                        $buy_price = $price;
                } elseif ($potential_profit > $greatest_profit) {
                        $greatest_profit = $potential_profit;
                }
        }

        return $greatest_profit;
}

echo maximumStockProfit([10,7,5,8,11,2,6]) . PHP_EOL;
echo maximumStockProfitAlt([10,7,5,8,11,2,6]) . PHP_EOL;

