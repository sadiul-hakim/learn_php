<?php

declare(strict_types=1);

namespace OOP\Creature;

// As all required classes, interfaces, enums and Trait are in same namespace
// I just need to require them. If they were in a different namespace I had to make use of `use`.
// This is bad in raw php that even if the classes have same namespace we still need to require them. We need to use `composer` to avoid this. 
require_once("./Gender.php");
require_once("./Danceable.php");
require_once("./Creature.php");
require_once("./Eater.php");
require_once("./UtensilMaster.php");

// I think if we use composer, we would not need to auto load by ourself.
// function autoLoad($class){
//     echo "<pre>";
//     print_r($class);
//     echo "</pre>";
//     require_once($class.'.php');
// }

// spl_autoload_register(__NAMESPACE__.'\autoLoad');

// Inside class
// If I access class property or non-static class method I should use $this ->
// If I access const or static variable or static method I should use self ::
// Outside class
// If I access const or static properties or method I should use ClassName::PropertyOrMethodName
// If I access instance property or method I should use instance -> propertyOrMethodName


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


