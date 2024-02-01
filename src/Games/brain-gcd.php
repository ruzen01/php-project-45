<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function gcd()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Find the greatest common divisor of given numbers.');

    $correctAnswerCount = 0;
    $consecutiveCorrectCount = 0;
    $roundCount = 0;

    function findGcd(int $randNumberFirst, int $randNumberSecond)
    {
        $result = 0;
        if (max($randNumberFirst, $randNumberSecond) % min($randNumberFirst, $randNumberSecond) == 0) {
            return $result = min($randNumberFirst, $randNumberSecond);
        }
        return $result = findGcd(min($randNumberFirst, $randNumberSecond), max($randNumberFirst, $randNumberSecond) % min($randNumberFirst, $randNumberSecond));
    }

    while ($roundCount < 3) {
        $randNumberFirst = rand(1, 25);
        $randNumberSecond = rand(1, 25);

        line("Question: {$randNumberFirst} {$randNumberSecond}");
        $answer = prompt('Your answer');

        if (!is_numeric($answer)) {
            line("'$answer' is not a number. Please enter a number.");
            continue;
        }

        $result = findGcd($randNumberFirst, $randNumberSecond);

        if ($answer == $result) {
            line("Correct!");
            $correctAnswerCount++;
            $consecutiveCorrectCount++;
            $roundCount++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'.\nLet's try again, $name!");
            $consecutiveCorrectCount = 0;
            return;
        }

        if ($consecutiveCorrectCount == 3) {
            line("Congratulations, %s!", $name);
            return;
        }
    }
}
