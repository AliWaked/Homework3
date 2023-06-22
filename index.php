<?php

use Homework3\Course\Course;
use Homework3\Manager\Manager;
use Homework3\Student\Student;

spl_autoload_register(function ($class) {
    include_once __DIR__ . '/' . str_replace('\\', '/', $class) . '.php';
});

$php_course = new Course('php');
$laravel_course = new Course('laravel');
$python_course = new Course('python');
$java_course = new Course('java');

$student1 = new Student('ali', 'ali@gmail.com', [$php_course, $laravel_course, $python_course, $java_course]);
$student2 = new Student('ahmed', 'Ahmed@gmail.com', [$java_course, $php_course]);
$student3 = new Student('mohammed', 'mohammed@gmail.com', [$php_course, $laravel_course]);

$manager = new Manager();

$manager->addStudent($student1);
$manager->addStudent($student2);
$manager->addStudent($student3);

var_dump($manager->retrieve(1));
var_dump($manager->retrieve(3));
var_dump($manager->retrieve(4));

var_dump($manager->update(1, 'omer', 'omer@gmail.com', [$php_course]));
var_dump($manager->update(2, courses: [$php_course, $laravel_course]));

echo $manager->delete(3),'<br/>';

$manager->printAllDataFromLogFile();
