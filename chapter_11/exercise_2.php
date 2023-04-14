<?php

// tail
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

// correct

// traditional
function evenAlt(array $numbers) {
	if (empty($numbers)) {
		return [];
	}

	if (($numbers[0] % 2) === 0) {
		return array_merge(
			[$numbers[0]],
			evenAlt(array_splice($numbers, 1, count($numbers) - 1))
		);
	}

	return evenAlt(array_splice($numbers, 1, count($numbers) - 1));
}

var_dump(even([1,2,3,4,5,6]));
var_dump(even([0,1,2,3,4,5,6]));

var_dump(evenAlt([1,2,3,4,5,6]));
var_dump(evenAlt([0,1,2,3,4,5,6]));

