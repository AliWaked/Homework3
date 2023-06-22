<?php

namespace Homework3\Manager;

trait Loggable
{
    public function addDataToLogFile($data): void
    {
        $file = fopen('loggable.log', 'a');
        fwrite($file, "$data\n");
        fclose($file);
    }
    public function printAllDataFromLogFile(): void
    {
        $file = fopen('loggable.log', 'r');
        while (!feof($file)) {
            echo fgets($file), '<br/>';
        }
        fclose($file);
    }
}
