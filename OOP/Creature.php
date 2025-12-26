<?php

declare(strict_types=1);

// Inside class
// If I access class property or non-static class method I should use $this ->
// If I access const or static variable or static method I should use self ::
// Outside class
// If I access static properties or method I should use ClassName::PropertyOrMethodName
// If I access instance property or method I should use instance -> propertyOrMethodName

enum Species: string
{
    case CAT = 'cat';
    case BIRD = 'bird';
    case FISH = 'fish';
    case HUMAN = 'human';
}

class Creature
{

    private string $name;
    private Species $species;

    public function getName() : string{
        return $this -> name;
    }

    public function getSpecies() : Species{
        return $this -> species;
    }

    public function __construct(
        string $name,
        Species $species
    ) {
        $this->$name = $name;
        $this->species = $species;
    }

    public function act(): void {
        // switch($this -> getSpecies())
        switch($this -> species)
        {
            case Species::CAT :
                echo "Meu Meu walking";
                break;
            case Species::BIRD :
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
}

$hakim = new Creature("Hakim",Species::HUMAN);
$hakim -> act();