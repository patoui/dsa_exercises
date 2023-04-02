<?php

function letterCount(array $strings): int {
	if (count($strings) === 1) {
		return strlen($strings[0]);
	}

	return strlen($strings[0]) + letterCount(array_splice($strings, 1, count($strings) - 1));
}

var_dump(letterCount(['ab','c','def','ghji']));
