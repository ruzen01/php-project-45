<?php

namespace BrainGames\Even;

use function cli\line;
use function cli\prompt;

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function even()
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    line('Answer "yes" if the number is even, otherwise answer "no".');

    $correctAnswers = 0;
    while ($correctAnswers < 3) {
        $number = rand(1, 100);
        line("Question: %d", $number);
        $answer = prompt('Your answer');

        $correctAnswer = isEven($number) ? 'yes' : 'no';

        if ($answer === $correctAnswer) {
            line('Correct!');
            $correctAnswers++;
        } else {
            line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $correctAnswer);
            line("Let's try again, %s!", $name);
            return;
        }
    }

    line("Congratulations, %s!", $name);
}
