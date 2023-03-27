<?php

function arr_intersect(array $a, array $b) {
	$largeArray = [];
	$smallArray = [];

	if (count($a) > count($b)) {
		$largeArray = $a;
		$smallArray = $b;
	} else {
		$largeArray = $b;
		$smallArray = $a;
	}

	$hashMap = [];

	foreach ($largeArray as $lVal) {
		$hashMap[$lVal] = true;
	}

	$intersection = [];

	foreach ($smallArray as $sVal) {
		if ($hashMap[$sVal] ?? false) {
			$intersection[] = $sVal;
		}
	}

	return $intersection;
}

var_dump(arr_intersect([1,2,3,4,5], [0,2,4,6,8]));

