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
	public function __construct(public Node $first_node)
	{
	}

	public function printAll(): void
	{
		$current_node = $this->first_node;
		while ($current_node) {
			print_r($current_node->value);
			$current_node = $current_node->next_node;
		}
	}
}

$node1 = new Node('a');
$node2 = new Node('b');
$node3 = new Node('c');

$node1->next_node = $node2;
$node2->next_node = $node3;

(new LinkedList($node1))->printAll();

