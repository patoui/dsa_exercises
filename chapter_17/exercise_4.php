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

	public function collectAllWords(
		TrieNode $node = null,
		string $word = '',
		array &$words = []
	): array {
		$currentNode = $node ?? $this->root;

		foreach ($currentNode->children as $key => $childNode) {
			if ($key === '*') {
				$words[] = $word;
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

	public function autocorrect(string $input): array
	{
		$currentNode = $this->root;

		// used to hold characters that exists in the trie
		$validInput = '';

		for ($i = 0; $i < strlen($input); $i++) {
			$char = $input[$i];

			if (!isset($currentNode->children[$char])) {
				break;
			}

			$currentNode = $currentNode->children[$char];
			$validInput .= $char;
		}

		return $this->collectAllWords($currentNode, $validInput);
	}

	public function autocorrectAlt(string $word): string
	{
		$currentNode = $this->root;
		$wordFoundSoFar = '';

		for ($i = 0; $i < strlen($word); $i++) {
			$char = $word[$i];

			if (isset($currentNode->children[$char])) {
				$wordFoundSoFar .= $char;
				$currentNode = $currentNode->children[$char];
			} else {
				return $wordFoundSoFar
					. $this->collectAllWords($currentNode)[0];

			}
		}

		return $word;
	}
}

$trie = new Trie();
$trie->insert('cat');
$trie->insert('catnap');
$trie->insert('catnip');
//$trie->printAll();

var_dump($trie->autocorrect('x'));
var_dump($trie->autocorrect('cat'));
var_dump($trie->autocorrect('caxasfdij'));
var_dump($trie->autocorrect('catn'));

var_dump($trie->autocorrectAlt('x'));
var_dump($trie->autocorrectAlt('cat'));
var_dump($trie->autocorrectAlt('caxasfdij'));
var_dump($trie->autocorrectAlt('catn'));

