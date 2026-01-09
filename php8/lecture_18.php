<?php

trait ExampleTrait{
    public const EXAMPLE = "example";
}

class MyClass{
    use ExampleTrait;
}

enum Status : string {
    case Draft = 'draft';
    case Published = 'published';
    case Archived = 'archived';
}