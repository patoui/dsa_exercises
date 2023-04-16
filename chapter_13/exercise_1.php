<?php

function highestProduct(array $numbers): int {
	sort($numbers);
	$last_number = array_pop($numbers) ?? 1;
	$second_last_number = array_pop($numbers) ?? 1;
	$third_last_number = array_pop($numbers) ?? 1;

	return $third_last_number * $second_last_number * $last_number; 
}

var_dump(highestProduct([5,2,3,1,4]));

