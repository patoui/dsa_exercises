<?php

function nonDuplicate(string $q) {
	$steps = 0;
	$charCounts = [];

	for ($i = 0; $i < strlen($q); $i++) {
		$steps++;
		if (!isset($charCounts[$q[$i]])) {
			$charCounts[$q[$i]] = 0;
		}
		$charCounts[$q[$i]]++;
	}

	foreach ($charCounts as $key => $value) {
		$steps++;
		if ($value === 1) {
			echo "STEPS: $steps" . PHP_EOL;
			return $key;
		}
	}

	echo "STEPS: $steps" . PHP_EOL;
	return null;
}

var_dump(nonDuplicate('minimum'));
