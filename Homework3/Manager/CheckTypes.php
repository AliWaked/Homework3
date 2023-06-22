<?php

declare(strict_types=1);

namespace Homework3\Manager;

use Course\Course;

trait CheckTypes
{
    public function checkType(array $course): array|null
    {
        return array_filter($course, function ($single_course) {
            if ($single_course instanceof Course) {
                return $single_course;
            }
        });
        return null;
    }
}
