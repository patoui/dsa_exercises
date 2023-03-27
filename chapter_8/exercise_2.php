<?php

function firstDuplicate(array $strings) {
	$steps = 0;
	$existingStrings = [];
	
	foreach ($strings as $str) {
		$steps++;
		if ($existingStrings[$str] ?? false) {
			echo "STEPS: $steps" . PHP_EOL;
			return $str;
		} else {
			$existingStrings[$str] = true;
		}
	}

	echo "STEPS: $steps" . PHP_EOL;
	return null;
}

var_dump(firstDuplicate(['a', 'b', 'c', 'd', 'c', 'e', 'f']));
