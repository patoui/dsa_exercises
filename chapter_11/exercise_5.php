<?php

// resources: https://indepthjavascript.dev/how-to-solve-the-unique-paths-leetcode-problem-with-javascript-and-recursion

function shortestPaths(int $rows, int $columns, int $columnIndex = 0, int $rowIndex = 0): int {
	$atEndOfRow = ($columns - 1) === $rowIndex;
	$atEndOfColumn = ($rows - 1) === $columnIndex;

	if ($atEndOfRow && $atEndOfColumn) {
		return 1;
	}

	if ($atEndOfRow && !$atEndOfColumn) {
		return shortestPaths($rows, $columns, $columnIndex + 1, $rowIndex);
	}

	if (!$atEndOfRow && $atEndOfColumn) {
		return shortestPaths($rows, $columns, $columnIndex, $rowIndex + 1);
	}

	// has not reached the end of the column, find shortest paths while incrementing row index
	$columnIndexPaths = shortestPaths($rows, $columns, $columnIndex + 1, $rowIndex);

	// has not reached the end of the row, find shortest paths while incrementing column index
	$rowIndexPaths = shortestPaths($rows, $columns, $columnIndex, $rowIndex + 1);

	return $columnIndexPaths + $rowIndexPaths;
}

var_dump(shortestPaths(3,7));

