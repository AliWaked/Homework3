<?php

declare(strict_types=1);

namespace Homework3\Student;

use Homework3\Manager\CheckTypes;

class Student
{
    use CheckTypes;
    public static int  $num = 1;
    public readonly int $id;
    public function __construct(public string $name, public string $email, public array $courses)
    {
        $this->courses = $this->checkType($this->courses);
        $this->id = $this->getIdNumber();
    }
    private function getIdNumber(): int
    {
        return self::$num++;
    }
}
