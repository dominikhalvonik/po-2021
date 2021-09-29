<?php

namespace Classes;

class Printer
{
    private $memory;

    public function __construct()
    {
        $this->memory = "";
    }

    public function countedPrint($string, $number)
    {
        for ($i = 0; $i < $number; $i++) {
            $tmpString = $string . "<br>";
            print $tmpString;
            $this->memory .= $tmpString;
        }
    }

    /**
     * @return string
     */
    public function getMemory()
    {
        return $this->memory;
    }

    /**
     * @param string $memory
     */
    public function setMemory($memory)
    {
        $this->memory = $memory;
    }


}