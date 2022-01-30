<?php

namespace Uniqoders\Game\Console;

class Config
{

    protected $config;

    public function __construct()
    {

        $this->config = array(
            'mode'  => array(//Game mode
                0 => 'Traditional',
                1 => 'Sheldon - Big bang theory',
            ),
            0 => array(//Traditional mode
                'weapons' => array(
                    0 => 'Scissors',
                    1 => 'Rock',
                    2 => 'Paper'
                ),
                'rules' => array(
                    0 => array(2),//Scissors beats paper  
                    1 => array(0),//Rock beats Scissors
                    2 => array(1),//Paper beats Rock
                )    
            ),
            1 => array(//Sheldon - Big bang theory mode
                'weapons' => array(
                    0 => 'Scissors',
                    1 => 'Rock',
                    2 => 'Paper',
                    3 => 'Lizard',
                    4 => 'Spock'
                ),
                'rules' => array(
                    0 => array(2, 3),//Scissors beats paper and Lizard  
                    1 => array(0, 3),//Rock beats Scissors and Lizard
                    2 => array(1, 4),//Paper beats Rock and Spock
                    3 => array(4, 2),//Lizard beats Spock and Paper
                    4 => array(0, 1),//Spock beats Scissors and rock
                )
            ),
            'max_round' => 5,//Maximum rounds of games
            'maximum_rounds_won' => 3
        );
    }
    
    /**
     * getGameMode
     *
     * @return array
     */
    public function getGameMode(): array
    {
        return $this->config['mode'];
    }
    
    /**
     * getRules
     *
     * @param  mixed $key
     * @return array
     */
    public function getRules($key): array
    {
        return $this->config[$key]['rules'];
    }
    
    /**
     * getWeapons
     *
     * @param  mixed $key
     * @return array
     */
    public function getWeapons($key): array
    {
        return $this->config[$key]['weapons'];
    }
    
    /**
     * getMaxRound
     *
     * @return int
     */
    public function getMaxRound(): int
    {
        return $this->config['max_round'];
    }
    
    /**
     * getMaximumRoundsWon
     *
     * @return int
     */
    public function getMaximumRoundsWon(): int
    {
        return $this->config['maximum_rounds_won'];
    }
}