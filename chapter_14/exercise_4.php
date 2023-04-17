<?php

class Node
{
	public function __construct(
		public mixed $value,
		public ?Node $next_node = null
	) {
	}
}

class LinkedList
{
	public function __construct(public ?Node $first_node = null)
	{
	}

	public function reverse(): void
	{
		$current_node = $this->first_node;

		if (!$current_node) {
			return;
		}

		$prev_node = null;

		while ($current_node) {
			$next_node = $current_node->next_node;
			$current_node->next_node = $prev_node;
			$prev_node = $current_node;
			$current_node = $next_node;
		}

		$this->first_node = $prev_node;
	}

	public function printAll(): void
	{
		$current_node = $this->first_node;
		while ($current_node) {
			echo $current_node->value;
			$current_node = $current_node->next_node;
		}
		echo PHP_EOL;
	}

}

$node1 = new Node('a');
$node2 = new Node('b');
$node3 = new Node('c');

$node1->next_node = $node2;
$node2->next_node = $node3;

$linkedList = new LinkedList($node1);
echo 'PRE SORT' . PHP_EOL;
$linkedList->printAll();

// reverse list
$linkedList->reverse();

echo 'POST SORT' . PHP_EOL;
$linkedList->printAll();

