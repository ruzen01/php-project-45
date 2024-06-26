<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\runGame;

const DESCRIPTION = 'What number is missing in the progression?';
const PROGRESSION_LENGTH = 10;

function generateProgression(int $start, int $step, int $length): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $start + ($i * $step);
    }
    return $progression;
}

function generateGameData(): array
{
    $start = rand(1, 50);
    $step = rand(1, 10);
    $hiddenIndex = rand(0, PROGRESSION_LENGTH - 1);

    $progression = generateProgression($start, $step, PROGRESSION_LENGTH);
    $correctAnswer = (string) $progression[$hiddenIndex];
    $progression[$hiddenIndex] = '..';

    $question = implode(' ', $progression);

    return [$question, $correctAnswer];
}

function playProgressionGame(): void
{
    runGame(DESCRIPTION, 'BrainGames\Games\Progression\generateGameData');
}
