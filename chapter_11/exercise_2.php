<?php

function even(array $numbers, array $even_numbers = []): array {
	$filter_even = fn ($number) => ($number % 2) === 0;

	if ($filter_even($numbers[0])) {
		$even_numbers[] = $numbers[0];
	}

	if (count($numbers) === 1) {
		return $even_numbers;
	}

	return even(
		array_splice($numbers, 1, count($numbers) - 1),
		$even_numbers
	);
}

var_dump(even([1,2,3,4,5,6]));
