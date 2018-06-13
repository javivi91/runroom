<?php

namespace Runroom\GildedRose;

class Item
{

    private $name;
    private $sellIn;
    private $quality;

    function __construct($name, $sellIn, $quality)
    {
        $this->name = $name;
        $this->sellIn = $sellIn;
        $this->quality = $quality;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }

    /**
     * Get the value of Name
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     */
    public function setName(string $name) : Item
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get the value of Sell In
     */
    public function getSellIn(): int
    {
        return $this->sellIn;
    }

    /**
     * Set the value of Sell In
     */
    public function setSellIn(int $sellIn) : Item
    {
        $this->sellIn = $sellIn;
        return $this;
    }

    /**
     * Get the value of Quality
     */
    public function getQuality(): int
    {
        return $this->quality;
    }

    /**
     * Set the value of Quality
     */
    public function setQuality(int $quality): Item
    {
        $this->quality = $quality;
        return $this;
    }
}
