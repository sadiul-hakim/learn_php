<?php

declare(strict_types=1);

namespace OOP\Creature;

require_once("./Species.php");

// this Creature class is not instantiable as it is abstract

abstract class Creature
{

    protected string $name;
    protected Species $species;

    protected function getName(): string
    {
        return $this->name;
    }

    protected function getSpecies(): Species
    {
        return $this->species;
    }

    // Once class may have only one constructor
    public function __construct(
        string $name,
        Species $species
    ) {
        $this->$name = $name;
        $this->species = $species;
    }

    protected function act(): void
    {
        // switch($this -> getSpecies())
        switch ($this->species) {
            case Species::CAT:
                echo "Meu Meu walking";
                break;
            case Species::BIRD:
                echo "Flying";
                break;
            case Species::FISH:
                echo "Swimming";
                break;
            case Species::HUMAN:
                echo "I am depressed";
                break;
            default:
                echo "Not Supported yet.";
        }
    }

    abstract function makeSound(): void;
}


// $hakim = new Creature("Hakim", Species::HUMAN);