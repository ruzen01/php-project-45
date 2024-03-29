<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function checkEven()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswerCount = 0;
    while ($correctAnswerCount < 3) {
        $randNumber = rand(1, 100);
        line("Question: %s", $randNumber);
        $answer = prompt('Your answer');

        $isEven = $randNumber % 2 === 0;

        if ($isEven && $answer == 'yes' || !$isEven && $answer === 'no') {
            line("Correct!");
            $correctAnswerCount++;
        } elseif ($isEven && $answer == 'no' || $isEven && $answer != 'no' || $isEven && $answer != 'yes') {
            line("'$answer' is wrong answer ;(. Correct answer was 'yes'.\nLet's try again, $name!");
            $correctAnswerCount = 0;
            break;
        } elseif (!$isEven && $answer == 'yes' || !$isEven && $answer != 'no' || !$isEven && $answer != 'yes') {
            line("'$answer' is wrong answer ;(. Correct answer was 'no'.\nLet's try again, $name!");
            $correctAnswerCount = 0;
            break;
        }
        line("Congratulations, %s!", $name);
    }
}
