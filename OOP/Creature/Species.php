<?php declare(strict_types=1);

namespace OOP\Creature;

enum Species: string
{
    case CAT = 'cat';
    case BIRD = 'bird';
    case FISH = 'fish';
    case HUMAN = 'human';
}