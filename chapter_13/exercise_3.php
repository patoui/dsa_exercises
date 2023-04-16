<?php

function highestOhOfNSquared(array $numbers): int {
	for ($i = 0; $i < count($numbers); $i++) {
		$is_highest = true;
		for ($j = 0; $j < count($numbers); $j++) {
			if ($numbers[$i] < $numbers[$j]) {
				$is_highest = false;
			}
		}

		if ($is_highest) {
			return $numbers[$i];
		}
	}

	return null;
}

function highestOhOfNLogN(array $numbers): int {
	sort($numbers);

	return array_pop($numbers);
}

function highestOhOfN(array $numbers): int {
	$highest = $numbers[0];

	for ($i = 1; $i < count($numbers); $i++) {
		if ($numbers[$i] > $highest) {
			$highest = $numbers[$i];
		}
	}

	return $highest;
}

var_dump(
	highestOhOfNSquared([9,3,2,5,6,7,1,0,4]),
	highestOhOfNLogN([9,3,2,5,6,7,1,0,4]),
	highestOhOfN([9,3,2,5,6,7,1,0,4]),
);

