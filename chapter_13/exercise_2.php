<?php

function missingNumber(array $numbers): ?int {
	sort($numbers);
	for ($i = 0; $i < count($numbers); $i++) {
		if ($i !== $numbers[$i]) {
			return $i;
		}
	}

	return null;
}

var_dump(missingNumber([9,3,2,5,6,7,1,0,4]));

