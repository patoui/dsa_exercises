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

	public function deleteNode(Node $node_to_delete): void
	{
		// the node to delete is the first node, update the next
		// first node to be the next node
		if ($this->first_node === $node_to_delete) {
			$this->first_node = $this->first_node->next_node;
			return;
		}

		// jump to the next node, as it's not the first node
		$current_node = $this->first_node->next_node;
		$prev_node = $this->first_node;
		while ($current_node) {
			if ($current_node === $node_to_delete) {
				$prev_node->next_node = $current_node->next_node;
				break;
			}
			$prev_node = $current_node;
			$current_node = $current_node->next_node;
		}
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
$node4 = new Node('d');
$node5 = new Node('e');

$node1->next_node = $node2;
$node2->next_node = $node3;
$node3->next_node = $node4;
$node4->next_node = $node5;

$linkedList = new LinkedList($node1);
echo 'PRE SORT' . PHP_EOL;
$linkedList->printAll();

// delete node
$linkedList->deleteNode($node3);

echo 'POST SORT' . PHP_EOL;
$linkedList->printAll();

