<?php

class Queue
{
	private array $items = [];
	private int $head = 0;
	private int $tail = 0;

	public function enqueue(mixed $item): void
	{
		$this->items[$this->tail] = $item;
		$this->tail++;
	}

	public function dequeue(): mixed
	{
		if (!isset($this->items[$this->head])) {
			return null;
		}
		$item = $this->items[$this->head];
		unset($this->items[$this->head]);
		$this->head++;
		return $item;
	}
}

class Person
{
	public function __construct(
		public string $name,
		public array $neighbours = []
	) {
	}

	public function addNeighbour(Person $person)
	{
		$this->neighbours[$person->name] = $person;
	}
}

function shortestConnection(Person $start, Person $relation) {
	// used to prevent revisiting relations
	$visited_relations = [];
	$visited_relations[$start->name] = true;

	$queue = new Queue();

	$distance_map = [];

	$current_person = $start;

	while ($current_person) {
		// check if we have a shortest path to the target relation, if so break from the loop
		if ($current_person === $relation) {
			break;
		}

		foreach ($current_person->neighbours as $person) {
			if (!isset($visited_relations[$person->name])) {
				$visited_relations[$person->name] = true;

				$queue->enqueue($person);

				$distance_map[$person->name] = $current_person->name;
			}
		}

		$current_person = $queue->dequeue();
	}

	$shortest_distance = [];
	$current_person_name = $relation->name;

	while ($current_person_name !== $start->name) {
		$shortest_distance[] = $current_person_name;
		$current_person_name = $distance_map[$current_person_name];
	}

	$shortest_distance[] = $start->name;

	return array_reverse($shortest_distance);
}

$idris = new Person('idris');
$kamil = new Person('kamil');
$talia = new Person('talia');
$lina = new Person('lina');
$ken = new Person('ken');
$marco = new Person('marco');
$sasha = new Person('sasha');

$idris->addNeighbour($kamil);
$idris->addNeighbour($talia);

$kamil->addNeighbour($idris);
$kamil->addNeighbour($lina);

$talia->addNeighbour($idris);
$talia->addNeighbour($ken);

$lina->addNeighbour($kamil);
$lina->addNeighbour($sasha);

$ken->addNeighbour($talia);
$ken->addNeighbour($marco);

$marco->addNeighbour($ken);
$marco->addNeighbour($sasha);

$sasha->addNeighbour($marco);
$sasha->addNeighbour($lina);

$shortest_connection = shortestConnection($idris, $lina);

print_r($shortest_connection);

