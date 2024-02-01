<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function findMissingNumber()
{
    function isPrime($number)
    {
        if ($number < 2) {
            return false;
        }

        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                return false;
            }
        }

        return true;
    }

    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if given number is prime. Otherwise answer "no".');

    $correctAnswerCount = 0;
    $consecutiveCorrectCount = 0;

    while ($correctAnswerCount < 3) {
        $randNumber = rand(1, 99);

        line("Question: %s", $randNumber);
        $answer = prompt('Your answer');

        if ((isPrime($randNumber) && $answer == 'yes') || (!isPrime($randNumber) && $answer == 'no')) {
            line("Correct!");
            $correctAnswerCount++;
            $consecutiveCorrectCount++;
        } else {
            $correctAnswer = isPrime($randNumber) ? 'yes' : 'no';
            line("'$answer' is wrong answer ;(. Correct answer was '$correctAnswer'.\nLet's try again, $name!");
            return;
        }

        if ($consecutiveCorrectCount == 3) {
            line("Congratulations, %s!", $name);
            return;
        }
    }
}
