<?php

namespace Classes;

class Counter
{
    /**
     * @var int
     */
    private $product;

    /**
     *
     */
    public function __construct()
    {
        $this->product = 0;
    }

    /**
     * @return int
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param int $product
     */
    public function setProduct($product)
    {
        $this->product = $product;

        return $this;
    }

    /**
     * @param $a
     * @param $b
     * @return int
     */
    public function sum($a, $b)
    {
        $this->product = $a + $b;

        return $this->product;
    }
}