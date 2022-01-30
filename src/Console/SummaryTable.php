<?php

namespace Uniqoders\Game\Console;

use Symfony\Component\Console\Helper\Table;

class SummaryTable 
{    
          
    /**
     * render
     *
     * @param  mixed $sumary
     * @param  mixed $output
     * @return void
     */
    public function render($sumary, $output) : void
    {

        $stats = $sumary;

        $stats = array_map(function ($player) {
            return [$player['name'], $player['stats']['victory'], $player['stats']['draw'], $player['stats']['defeat']];
        }, $stats);

        $output->write(PHP_EOL . '.:: TABLE OF STATS ::.' . PHP_EOL . PHP_EOL);

        $table = new Table($output);
        $table
            ->setHeaders(['Player', 'Victory', 'Draw', 'Defeat'])
            ->setRows($stats);
        $table->setStyle('box-double');
        $table->render();

    }

}