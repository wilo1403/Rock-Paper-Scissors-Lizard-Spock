<?php

namespace Uniqoders\Game\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class GameCommand extends Command
{
    protected $config;
    protected $choice_question;
    protected $summary_table;
    protected $evaluate_round;
        
    /**
     * __construct
     *
     * @param  mixed $config
     * @return void
     */
    public function __construct()
    {
        $this->config = new Config;
        $this->choice_question = new ChoiceQuestionGame;
        $this->summary_table = new SummaryTable;
        parent::__construct();
    }

    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure(): void
    {
        $this->setName('game')
            ->setDescription('New game: you vs computer')
            ->addArgument('name', InputArgument::OPTIONAL, 'what is your name?', 'Player 1');
    }
    
    /**
     * execute
     *
     * @param  mixed $input
     * @param  mixed $output
     * @return void
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    { 
        $io = new SymfonyStyle($input, $output);
        $io->title('Made with ♥ by Uniqoders and upgraded by Wilson.');

        $player_name = $input->getArgument('name');
        $this->stats = new Stats($player_name);
        

        // Game mode choice
        $mode_key = $this->choice_question->choice($io, 'Please select the game mode', $this->config->getGameMode());
        
        //Set weapons and rules 
        $weapon = $this->config->getWeapons($mode_key);
        $rules = $this->config->getRules($mode_key);
        
        $round = 1;
        do {
            // Weapon choice
            $user_weapon = $this->choice_question->choice($io, 'Please select your weapon', $weapon);
       
            // Computer choice
            $computer_weapon = array_rand($weapon);
            $io->text('Computer has just selected: '.$weapon[$computer_weapon]);
            
            // Evaluate Round
            $this->evaluate_round = new EvaluateRound();
            $result = $this->evaluate_round->calculate($user_weapon, $computer_weapon, $rules, $this->stats);
            if($result == 'draw'){
                $io->warning('Draw!');
            }elseif($result == 'player'){
                $io->success($player_name . ' win!');
            }elseif($result == 'computer'){
                $io->caution('Computer win!');
            }
            $stats = $this->stats->getStats();
                if((int) $stats['player']['stats']['victory'] == $this->config->getMaximumRoundsWon()){
                    break;
                }else{
                    $round++;
                }
        
        } while ($round <= $this->config->getMaxRound());

        // Display stats
        $this->summary_table->render($stats, $output);

        return Command::SUCCESS;
    }

}
