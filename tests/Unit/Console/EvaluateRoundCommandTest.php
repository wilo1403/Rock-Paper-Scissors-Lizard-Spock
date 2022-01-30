<?php

namespace Uniqoders\Tests\Unit\Console;

use Uniqoders\Tests\Unit\UnitTestCase;

class EvaluateRoundCommandTest extends UnitTestCase
{

    public function test_Evaluate_Player_Win(): void
    {
        $evaluate = new \Uniqoders\Game\Console\EvaluateRound;

        $user_weapon = 0;
        $computer_weapon = 2;
        $rules = array(
            0 => array(2, 3),//Scissors beats paper and Lizard  
            1 => array(0, 3),//Rock beats Scissors and Lizard
            2 => array(1, 4),//Paper beats Rock and Spock
            3 => array(4, 2),//Lizard beats Spock and Paper
            4 => array(0, 1),//Spock beats Scissors and rock
        );
        $stats = new \Uniqoders\Game\Console\Stats('Wilson');

        $test_response = $evaluate->calculate($user_weapon, $computer_weapon, $rules, $stats);
        $this->assertContains($test_response, ['player']);
    }

    public function test_Evaluate_Draw(): void
    {
        $evaluate = new \Uniqoders\Game\Console\EvaluateRound;

        $user_weapon = 0;
        $computer_weapon = 0;
        $rules = array(
            0 => array(2, 3),//Scissors beats paper and Lizard  
            1 => array(0, 3),//Rock beats Scissors and Lizard
            2 => array(1, 4),//Paper beats Rock and Spock
            3 => array(4, 2),//Lizard beats Spock and Paper
            4 => array(0, 1),//Spock beats Scissors and rock
        );
        $stats = new \Uniqoders\Game\Console\Stats('Wilson');

        $test_response = $evaluate->calculate($user_weapon, $computer_weapon, $rules, $stats);
        $this->assertContains($test_response, ['draw']);
    }

    public function test_Evaluate_Computer_Win(): void
    {
        $evaluate = new \Uniqoders\Game\Console\EvaluateRound;

        $user_weapon = 1;
        $computer_weapon = 2;
        $rules = array(
            0 => array(2, 3),//Scissors beats paper and Lizard  
            1 => array(0, 3),//Rock beats Scissors and Lizard
            2 => array(1, 4),//Paper beats Rock and Spock
            3 => array(4, 2),//Lizard beats Spock and Paper
            4 => array(0, 1),//Spock beats Scissors and rock 
        );
        $stats = new \Uniqoders\Game\Console\Stats('Wilson');

        $test_response = $evaluate->calculate($user_weapon, $computer_weapon, $rules, $stats);
        $this->assertContains($test_response, ['computer']);
    }
}
