<?php

function arr_intersect(array $a, array $b) {
	$hashMap = [];

	foreach ($a as $aVal) {
		$hashMap[$aVal] = true;
	}

	$intersection = [];

	foreach ($b as $bVal) {
		if ($hashMap[$bVal] ?? false) {
			$intersection[] = $bVal;
		}
	}

	return $intersection;
}

var_dump(arr_intersect([1,2,3,4,5], [0,2,4,6,8]));

