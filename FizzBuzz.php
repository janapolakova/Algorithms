<?php

class FizzBuzz {
    /**
     * Fizz Buzz.
     *
     * @param string $filePath
     * @return string
     */
    public static function getResult($filePath){
        $arguments = self::getArgumentsFromFile($filePath);

        $result = '';
        foreach ($arguments as $argument){
            $countTo = $argument[2];
            for ($i = 1; $i < $countTo; $i++){
                $isFizz = !($i % $argument[0]);
                $isBuzz = !($i % $argument[1]);

                if ($isFizz){ $result .= 'F'; }
                if ($isBuzz){ $result .= 'B'; }
                if (!$isFizz && !$isBuzz){ $result .= $i; }
                $result .= ' ';
            }
            $result .= '<br />';
        }

        return $result;
    }

    /**
     * Get arguments from file.
     *
     * @param string $filePath
     * @return array
     */
    private static function getArgumentsFromFile($filePath){
        $arguments = [];
        $handle = fopen($filePath, 'r');

        while (($fileLine = fgets($handle)) !== false) {
            $arguments[] = self::getArgumentsFromLine($fileLine);
        }

        fclose($handle);

        return $arguments;
    }

    /**
     * Get fizz buzz arguments from file line.
     *
     * @param string $line
     * @return array
     */
    private static function getArgumentsFromLine($line){
        return explode(' ', $line);
    }
}

echo FizzBuzz::getResult('/Users/jana/Desktop/file/source.txt');