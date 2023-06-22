<?php

declare(strict_types=1);

namespace Homework3\Course;

class Course
{
    public static int $num = 1;
    public readonly int $course_id;
    public function __construct(public string $course_name)
    {
        $this->course_id = $this->getCourseIdNumber();
    }
    public function getCourseIdNumber(): int
    {
        return self::$num++;
    }
}
