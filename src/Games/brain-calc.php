<?php

namespace BrainGames\Cli;

use function cli\line;
use function cli\prompt;

function calc()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('What is the result of the expression?');

    $consecutiveCorrectAnswerCount = 0;

    while ($consecutiveCorrectAnswerCount < 3) {
        $randNumberFirst = rand(0, 10);
        $randNumberSecond = rand(0, 10);
        $operators = ['+', '-', '*'];
        $randOperator = $operators[array_rand($operators)];

        line("Question: {$randNumberFirst} {$randOperator} {$randNumberSecond}");
        $answer = prompt('Your answer');

        switch ($randOperator) {
            case '+':
                $result = $randNumberFirst + $randNumberSecond;
                break;
            case '-':
                $result = $randNumberFirst - $randNumberSecond;
                break;
            case '*':
                $result = $randNumberFirst * $randNumberSecond;
                break;
        }

        if ($answer == $result) {
            line("Correct!");
            $consecutiveCorrectAnswerCount++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'.\nLet's try again, $name!");
            return;
        }
    }


    line("Congratulations, %s!", $name);
}
