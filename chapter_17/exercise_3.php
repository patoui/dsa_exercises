<?php

class TrieNode
{
	public function __construct(public array $children = []) {}
}

class Trie
{
	public function __construct(public TrieNode $root = new TrieNode()) {}

	public function printAll(): void
	{
		foreach ($this->collectAllWords() as $word) {
			echo $word . PHP_EOL;
		}
	}

	public function traverse(TrieNode $node = null): void
	{
		$currentNode = $node ?? $this->root;

		foreach ($currentNode->children as $key => $childNode) {
			echo $key;
			if ($key !== '*') {
				$this->traverse($childNode);
			}
		}
	}

	public function collectAllWords(
		TrieNode $node = null,
		string $word = '',
		array &$words = []
	): array {
		$currentNode = $node ?? $this->root;

		foreach ($currentNode->children as $key => $childNode) {
			if ($key === '*') {
				$words[] = $word . $key;
			} else {
				$this->collectAllWords(
					$childNode,
					$word . $key,
					$words
				);
			}
		}

		return $words;
	}

	public function insert(string $word): void
	{
		$currentNode = $this->root;

		for ($i = 0; $i < strlen($word); $i++) {
			$char = $word[$i];

			if (isset($currentNode->children[$char])) {
				$currentNode = $currentNode->children[$char];
			} else {
				$newNode = new TrieNode();
				$currentNode->children[$char] = $newNode;
				$currentNode = $newNode;
			}
		}

		$currentNode->children['*'] = null;
	}
}

$trie = new Trie();
$trie->insert('ace');
$trie->insert('act');
$trie->insert('we');
$trie->insert('well');
$trie->insert('went');
$trie->traverse();

