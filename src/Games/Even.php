<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if the number is even, otherwise answer "no".';

function isEven(int $number): bool
{
    return $number % 2 === 0;
}

function generateGameData(): array
{
    $number = rand(1, 100);
    $question = (string) $number;
    $correctAnswer = isEven($number) ? 'yes' : 'no';

    return [$question, $correctAnswer];
}

function playEvenGame(): void
{
    runGame(DESCRIPTION, 'BrainGames\Games\Even\generateGameData');
}
