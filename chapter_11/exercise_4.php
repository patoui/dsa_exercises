<?php

function findX(string $s): int {
	$lastIndex = strlen($s)-1;
	if ($s[$lastIndex] === 'x') {
		return $lastIndex;
	}
	return findX(substr($s, 0, $lastIndex));
}

// correct

// alt solution
function findXAlt(string $s): int {
	if ($s[0] === 'x') {
		return 0;
	}

	return findXAlt(substr($s, 1, strlen($s) - 1)) + 1;
}

var_dump(findX('abcdefghijklmnopqrstuvwxyz'));
var_dump(findXAlt('abcdefghijklmnopqrstuvwxyz'));
