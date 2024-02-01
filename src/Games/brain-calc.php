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

    $correctAnswerCount = 0;
    $consecutiveCorrectCount = 0;
    $roundCount = 0;

    while ($roundCount < 3) {
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
            print_r("Correct!\n");
            $correctAnswerCount++;
            $consecutiveCorrectCount++;
            $roundCount++;
        } else {
            line("'$answer' is wrong answer ;(. Correct answer was '$result'.\nLet's try again, $name!");
            $consecutiveCorrectCount = 0;
            break; // Выход из цикла при неправильном ответе
        }

        if ($consecutiveCorrectCount == 3) {
            break; // Выход из цикла при трех правильных ответах подряд
        }
    }

    if ($consecutiveCorrectCount == 3) {
        line("Congratulations, %s!", $name);
    }
}