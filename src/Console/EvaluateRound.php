<?php

namespace Uniqoders\Game\Console;

class EvaluateRound 
{       
 
    /**
     * calculate
     *
     * @param  mixed $io
     * @param  mixed $user_weapon
     * @param  mixed $weapon
     * @param  mixed $rules
     * @param  mixed $stats
     * @return array
     */
    public function calculate($user_weapon, $computer_weapon, $rules, $stats) : string
    {
       $result = null;
       if ($user_weapon == $computer_weapon) {
            $stats->setDrawPUp();
            $stats->setDrawCUp();
            $result = 'draw';

       } else if (in_array($computer_weapon, $rules[$user_weapon])) {
            $stats->setVictoryPUp();
            $stats->setDefeatCUp();
            $result = 'player';

       } else {
            $stats->setDefeatPUp();
            $stats->setVictoryCUp();
            $result = 'computer';
       }
       
       return $result;
    }

}