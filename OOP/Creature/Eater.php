<?php

declare(strict_types=1);

namespace OOP\Creature;

/**
 * Trait
 * You can think of a Trait as a require() for methods inside a class—but much cleaner and safer.
 * Purpose: Code reuse across classes without inheritance.
 * Can contain: Methods, properties, even abstract methods.
 * Cannot: Be instantiated directly.
 * Usage: `use` keyword inside a class.
 */

trait Eater
{
    public function eat(): void
    {
        echo "Eating";
    }

    public function useUtensil(): void
    {
        echo "Using Fork";
    }
}