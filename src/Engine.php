<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const ROUNDS_COUNT = 3;

function runGame(string $gameDescription, callable $generateGameData): void
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line($gameDescription);

    for ($i = 0; $i < ROUNDS_COUNT; $i++) {
        [$question, $correctAnswer] = $generateGameData();
        line("Question: %s", $question);
        $userAnswer = prompt('Your answer');

        if ($userAnswer !== $correctAnswer) {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $userAnswer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }

        line('Correct!');
    }

    line("Congratulations, %s!", $name);
}
