<?php

function findX(string $s): int {
	$lastIndex = strlen($s)-1;
	if ($s[$lastIndex] === 'x') {
		return $lastIndex;
	}
	return findX(substr($s, 0, $lastIndex));
}

var_dump(findX('abcdefghijklmnopqrstuvwxyz'));
