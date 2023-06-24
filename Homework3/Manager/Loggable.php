<?php

namespace Homework3\Manager;

use DateTime;

trait Loggable
{
    public function addDataToLogFile($data): void
    {
        $file = fopen('loggable.log', 'a');
        fwrite($file, date_format(new DateTime(), 'Y/m/d h:m:s A') . "\n$data\n");
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
