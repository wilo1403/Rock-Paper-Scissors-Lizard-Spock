<?php

namespace Uniqoders\Game\Console;

use Symfony\Component\Console\Question\ChoiceQuestion;
class ChoiceQuestionGame 
{    
          
    /**
     * choice
     *
     * @param  mixed $io
     * @param  mixed $question
     * @param  mixed $options
     * @return string
     */
    public function choice($io, $question, $options) : string
    {
        $io->newLine();
        $response = $io->choice($question, array_values($options), 0);
        $io->text('You have just selected: '.$response);
        $response = array_search($response, $options);

        return $response;

    }

}