<?php

/**
 * There is a numerical sequence known as "Triangular Numbers." The pattern begins as
 * 1, 3, 6, 10, 15, 21, and continue onward with the Nth number in the pattern, which
 * is N plus the previous number. For example, the 7th number in the sequence is 28,
 * since it's 7 (which is N) plus 21 (the previous number in the sequence). Write
 * a function that accepts a number for N and returns the correct number from the
 * series. That is, if the function was passed the number 7, the function would
 * return 28.
 */

// tail recursion
function triangleNumber($n, $l = 0) {
	if ($n === 1) {
		return 1;
	}

	$l = triangleNumber($n-1, $l);

	return $n + $l;
}

// correct

// traditional recursion
function triangleNumberAlt($n) {
	if ($n === 1) {
		return 1;
	}

	return $n + triangleNumberAlt($n-1);
}

echo 'RESULT: ' . triangleNumber(7) . PHP_EOL;
echo 'RESULT: ' . triangleNumberAlt(7) . PHP_EOL;

