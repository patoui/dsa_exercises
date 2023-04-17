<?php

class Node
{
	public function __construct(
		public mixed $value,
		public ?Node $prev_node = null,
		public ?Node $next_node = null
	) {
	}
}

class DoublyLinkedList
{
	public function __construct(
		public ?Node $first_node = null,
		public ?Node $last_node = null
	) {
	}

	public function printInReverse(): void
	{
		$current_node = $this->last_node;
		while ($current_node) {
			print_r($current_node->value);
			$current_node = $current_node->prev_node;
		}
	}
}

$node1 = new Node('a');
$node2 = new Node('b');
$node3 = new Node('c');

$node1->next_node = $node2;
$node2->prev_node = $node1;
$node2->next_node = $node3;
$node3->prev_node = $node2;

(new DoublyLinkedList($node1, $node3))->printInReverse();

