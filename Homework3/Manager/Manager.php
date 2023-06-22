<?php

declare(strict_types=1);

namespace Homework3\Manager;

use Homework3\Manager\Loggable;
use Homework3\Manager\CheckTypes;
use Homework3\Student\Student;

class Manager
{
    use CheckTypes, Loggable;
    private array $students = [];
    public function addStudent(Student $student): void
    {
        $student->courses = $this->checkType($student->courses) ?? [];
        $this->students[] = $student;
        $this->addDataToLogFile("add new student has id = {$student->id}, name = '{$student->name}', email = {$student->email} ,{$this->getCoursesName($student->courses)}");
    }
    public function retrieve(int $id): Student|string
    {
        if ($studnet = $this->foundStudnet($id)) {
            return $studnet;
        }
        return 'The Studnet Id= ' . $id . ' is not exists';
    }
    public function update(int $id, ?string $name = null, ?string $email = null, ?array $courses = null): string|Student
    {
        if ($student = $this->foundStudnet($id)) {
            $student->name = $name ?? $student->name;
            $student->email = $email ?? $student->email;
            $student->courses = $this->checkType($courses) ?? $student->courses;
            $this->addDataToLogFile("updated student has id = {$student->id}, name = '{$student->name}', email = {$student->email} ,{$this->getCoursesName($student->courses)}");
            return $student;
        }
        return "not found student has the number id equal $id";
    }
    public function delete(int $id): string
    {
        if ($student = $this->foundStudnet($id)) {
            unset($this->students[array_keys($this->students, $student)[0]]);
            $this->addDataToLogFile("deleted student has id = {$student->id}, name = '{$student->name}', email = {$student->email} ,{$this->getCoursesName($student->courses)}");
            return 'success to deleted student has id equal' . $id;
        } else {
            return "the student has id $id not found";
        }
    }
    private function foundStudnet(int $id): Student|bool
    {
        foreach ($this->students as $studnet) {
            if ($studnet->id == $id) {
                return $studnet;
            }
        }
        return false;
    }
    private function getCoursesName(array $courses): string
    {
        $courses_name = '';
        foreach ($courses as $course) {
            $courses_name .= "course id = '{$course->course_id}', course name = '{$course->course_name}'";
        }
        return $courses_name;
    }
}
