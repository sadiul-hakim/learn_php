<?php

#[Attribute]
class Example{

}

class User
{
    private string $name;
    private string $email;
    private string $password;

    public function __construct(
        string $name,
        string $email,
        string $password,
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

class EasyUser
{
    public function __construct(
        private string $name,
        private string $email,
        private string $password,
    ) {}

    #[Example("This method is used to get name.")]
    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}

// 8.4
// $attr = new ReflectionMethod(EasyUser::class,"getName") -> getAttributes(Example::class)[0]->newInstance();