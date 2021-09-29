<?php

namespace Classes;

class Printer
{
    private $string = "";

    public function __construct($string)
    {
        $this->string = $string;
    }

    public function test()
    {
        for($i = 0; $i < 10; $i++) {
            $this->string = $i . "<br>";
            print $this->string;
        }
    }

    /**
     * @return string
     */
    public function getString()
    {
        return $this->string;
    }

    /**
     * @param string $string
     */
    public function setString($string)
    {
        $this->string = $string;
    }


}