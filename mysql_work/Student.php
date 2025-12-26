<?php

namespace mysql_work;

class Student
{
    private int $id;
    private string $name;
    private string $course;
    private string $batch;
    private string $city;
    private string $year;

    public function __construct(
        int $id,
        string $name,
        string $course,
        string $batch,
        string $city,
        string $year
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->course = $course;
        $this->batch = $batch;
        $this->city = $city;
        $this->year = $year;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCourse(): string
    {
        return $this->course;
    }

    public function getBatch(): string
    {
        return $this->batch;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getYear(): string
    {
        return $this->year;
    }
}
