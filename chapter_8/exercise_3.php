<?php

define('ALPHABET', [
	'a' => true,
	'b' => true,
	'c' => true,
	'd' => true,
	'e' => true,
	'f' => true,
	'g' => true,
	'h' => true,
	'i' => true,
	'j' => true,
	'k' => true,
	'l' => true,
	'm' => true,
	'n' => true,
	'o' => true,
	'p' => true,
	'q' => true,
	'r' => true,
	's' => true,
	't' => true,
	'u' => true,
	'v' => true,
	'w' => true,
	'x' => true,
	'y' => true,
	'z' => true,
]);

function missingAlphabet(string $query): array|string {
	$alpha = ALPHABET;
	for ($i = 0; $i < strlen($query); $i++) {
		unset($alpha[$query[$i]]);
	}

	return count($alpha) === 1 ? key($alpha) : array_keys($alpha);
}

var_dump(missingAlphabet('the quick brown box jumps over the lazy dog'));
