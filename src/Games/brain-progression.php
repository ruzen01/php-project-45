<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function findMissingNumber()
{

    $correctAnswerCount = 0;
    $consecutiveCorrectCount = 0;
    $roundCount = 0;

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What number is missing in the progression?');

    while ($roundCount < 3) {
        $arrayOfProgression = [];
        $length = rand(5, 10);
        for ($i = rand(0, 10), $step = rand(1, 10); count($arrayOfProgression) < $length; $i = $i + $step) {
            $arrayOfProgression[] = $i;
        }

        $randKey = array_rand($arrayOfProgression);
        $invisNumber = $arrayOfProgression[$randKey];
        $arrayOfProgression[$randKey] = '..';

        line("Question: %s", implode(' ', $arrayOfProgression));
        $answer = prompt('Your answer');


        if ($answer == $invisNumber) {
            line("Correct!");
            $correctAnswerCount++;
            $consecutiveCorrectCount++;
            $roundCount++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$invisNumber'.\nLet's try again, $name!");
            $consecutiveCorrectCount = 0;
            return;
        }

        if ($consecutiveCorrectCount == 3) {
            line("Congratulations, %s!", $name);
            return;
        }
    }
}
