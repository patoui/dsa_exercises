<?php

// resources: https://indepthjavascript.dev/how-to-solve-the-unique-paths-leetcode-problem-with-javascript-and-recursion

function uniquePaths(int $rows, int $columns, int $columnIndex = 0, int $rowIndex = 0): int {
	$atEndOfRow = ($columns - 1) === $rowIndex;
	$atEndOfColumn = ($rows - 1) === $columnIndex;

	if ($atEndOfRow && $atEndOfColumn) {
		return 1;
	}

	if ($atEndOfRow && !$atEndOfColumn) {
		return uniquePaths($rows, $columns, $columnIndex + 1, $rowIndex);
	}

	if (!$atEndOfRow && $atEndOfColumn) {
		return uniquePaths($rows, $columns, $columnIndex, $rowIndex + 1);
	}

	// has not reached the end of the column, find shortest paths while incrementing row index
	$columnIndexPaths = uniquePaths($rows, $columns, $columnIndex + 1, $rowIndex);

	// has not reached the end of the row, find shortest paths while incrementing column index
	$rowIndexPaths = uniquePaths($rows, $columns, $columnIndex, $rowIndex + 1);

	return $columnIndexPaths + $rowIndexPaths;
}


// alt solution
function uniquePathsAlt(int $rows, int $columns): int {
	if ($rows === 1 || $columns === 1) {
		return 1;
	}

	return uniquePathsAlt($rows - 1, $columns) + uniquePathsAlt($rows, $columns - 1);
}

var_dump(uniquePaths(3,7));
var_dump(uniquePathsAlt(3,7));

