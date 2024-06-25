<?php

namespace BrainGames\Games\Calc;

use function BrainGames\Engine\run;

const DESCRIPTION = 'What is the result of the expression?';

function calculate($num1, $num2, $operator)
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            throw new \Exception("Unknown operator: {$operator}");
    }
}

function getGameData()
{
    $num1 = rand(1, 20);
    $num2 = rand(1, 20);
    $operators = ['+', '-', '*'];
    $operator = $operators[array_rand($operators)];

    $question = "{$num1} {$operator} {$num2}";
    $correctAnswer = (string) calculate($num1, $num2, $operator);

    return [$question, $correctAnswer];
}

function calc()
{
    \BrainGames\Engine\run(DESCRIPTION, fn() => getGameData());
}
