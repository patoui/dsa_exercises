<?php

class Player
{
        public function __construct(
                public string $first_name,
                public string $last_name,
                public string $team
        ) {}
}

function multipleSports(array $team_one, array $team_two): array {
        $players = [];

        foreach ($team_one as $player) {
                $full_name = $player->first_name . ' ' . $player->last_name;
                $players[$full_name] = true;
        }

        $players_multiple_sports = [];
        foreach ($team_two as $player) {
                $full_name = $player->first_name . ' ' . $player->last_name;
                if (isset($players[$full_name])) {
                        $players_multiple_sports[] = $full_name;
                }
        }

        return $players_multiple_sports;
}

$jill_h = new Player('Jill', 'Huang', 'Gators');
$janko_b = new Player('Janko', 'Barton', 'Sharks');
$wanda_v = new Player('Wanda', 'Vakulskas', 'Sharks');
$jill_m = new Player('Jill', 'Moloney', 'Gators');
$luuk_w = new Player('Luuk', 'Watkins', 'Gators');

$hanzla_r = new Player('Hanzla', 'Radosti', '32ers');
$tina_w = new Player('Tina', 'Watkins', 'Barleycorns');
$alex_p = new Player('Alex', 'Patel', '32ers');

$team_one = [
        $jill_h,
        $janko_b,
        $wanda_v,
        $jill_m,
        $luuk_w,
];

$team_two = [
        $hanzla_r,
        $tina_w,
        $alex_p,
        $jill_h,
        $wanda_v,
];

print_r(multipleSports($team_one, $team_two));



