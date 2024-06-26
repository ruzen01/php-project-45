<?php

namespace BrainGames\Games\Prime;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function isPrime(int $number): bool
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

function generateGameData(): array
{
    $number = rand(1, 100);
    $question = (string) $number;
    $correctAnswer = isPrime($number) ? 'yes' : 'no';
    return [$question, $correctAnswer];
}

function playPrimeGame(): void
{
    runGame(DESCRIPTION, 'BrainGames\Games\Prime\generateGameData');
}
