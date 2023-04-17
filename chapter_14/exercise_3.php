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

	public function readAtIndex(int $index): void
	{
		$current_node = $this->first_node;
		$current_index = 0;

		while ($current_index < $index) {
			$current_node = $current_node->next_node;

			if (!$current_node) {
				print_r('Not found');
				return;
			}

			$current_index++;
		}

		print_r($current_node->value);
	}
}

$node1 = new Node('a');
$node2 = new Node('b');
$node3 = new Node('c');

$node1->next_node = $node2;
$node2->next_node = $node3;

(new LinkedList($node1))->readAtIndex(2);

