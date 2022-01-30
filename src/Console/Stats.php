<?php

namespace Uniqoders\Game\Console;

use Uniqoders\Game\Console\StatsInterface;

class Stats implements StatsInterface
{
    public int $draw_c = 0;
    public int $victory_c = 0;
    public int $defeat_c = 0;
    public int $draw_p = 0;
    public int $victory_p = 0;
    public int $defeat_p = 0;
    public $stats_summary;

    public function __construct($player_name)
    {
        $this->player_name = $player_name;
        $this->return_array($player_name);
    }

    public function setDrawCUp(): void
    {
        $this->draw_c++;
    }
    public function setVictoryCUp(): void
    {
        $this->victory_c++;
    }
    public function setDefeatCUp(): void
    {
        $this->defeat_c++;
    }


    public function setDrawPUp(): void
    {
        $this->draw_p++;
    }
    public function setVictoryPUp(): void
    {
        $this->victory_p++;
    }
    public function setDefeatPUp(): void
    {
        $this->defeat_p++;
    }

    public function getStats(): array
    {
        return $this->return_array();
    }

    public function return_array(): array
    {
        return $this->stats_summary = [
            'player' => [
                'name' => $this->player_name??'Player1',
                'stats' => [
                    'draw' => $this->draw_p,
                    'victory' => $this->victory_p,
                    'defeat' => $this->defeat_p,
                ]
            ],
            'computer' => [
                'name' => 'Computer',
                'stats' => [
                    'draw' => $this->draw_c,
                    'victory' => $this->victory_c,
                    'defeat' => $this->defeat_c,
                ]
            ]
        ];
    }

}