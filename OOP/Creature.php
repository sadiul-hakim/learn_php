<?php

declare(strict_types=1);

interface Danceable
{
    function dance(): void;
}

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

trait UtensilMaster
{

    public function useUtensil(): void
    {
        echo "Using Chopstick";
    }
}

// Inside class
// If I access class property or non-static class method I should use $this ->
// If I access const or static variable or static method I should use self ::
// Outside class
// If I access const or static properties or method I should use ClassName::PropertyOrMethodName
// If I access instance property or method I should use instance -> propertyOrMethodName

enum Species: string
{
    case CAT = 'cat';
    case BIRD = 'bird';
    case FISH = 'fish';
    case HUMAN = 'human';
}

enum Gender: string
{
    case MALE = 'male';
    case FEMALE = 'female';
}

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

// ❌ PHP does NOT support multiple inheritance of classes. But support multiple interface implementations
// As Human is declared final, it is no longer inheritable
final class Human extends Creature implements Danceable
{

    private int $age;
    private string $profession;

    private Gender $gender;

    use Eater;

    use UtensilMaster{
        // Use Eater useUtensil
        Eater::useUtensil insteadof UtensilMaster;
        // or changeName
        UtensilMaster::useUtensil as useChopstick;
    }

    public function __construct(
        string $name,
        int $age,
        string $profession,
        Gender $gender
    ) {
        parent::__construct($name, Species::HUMAN);
        $this->age = $age;
        $this->profession = $profession;
        $this->gender = $gender;
    }

    public function getAge(): int
    {
        return $this->age;
    }
    public function getProfession(): string
    {
        return $this->profession;
    }
    public function getGender(): Gender
    {
        return $this->gender;
    }

    public function makeSound(): void
    {
        echo "Humans are bad";
    }

    public function dance(): void
    {
        echo "Bullshit dance";
    }



    // Overriding Trait method
    // public function useUtensil(): void {
    //     echo "Using Spoon";
    // }
}

$rakib = new Human("Rakib", 26, "Web Developer", Gender::MALE);

echo "<pre>";
print_r($rakib);
echo "</pre>";

echo "<br/>";
$rakib->makeSound();
echo "<br/>";
$rakib->eat();
echo "<br/>";
$rakib->useUtensil();
echo "<br/>";
$rakib->useChopstick();
echo "<br/>";

class HumanProperties
{
    public static string $NAME = "name";
    public static string $AGE = "age";
    public static string $PROFESSION = "profession";
    public static string $GENDER = "gender";
}

echo "<br/>";
echo HumanProperties::$NAME;
