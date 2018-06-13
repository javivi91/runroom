<?php

namespace Runroom\GildedRose;

class Item
{
    const MIN_QUALITY = 0;
    const MAX_QUALITY = 50;

    private $name;
    private $sellIn;
    private $quality;

    public function __construct($name, $sellIn, $quality)
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
     * Increase quality if not exceeds the limit
     */
    public function increaseQuality($sum = 1)
    {
        if ($this->quality < self::MAX_QUALITY) {
            $this->setQuality($this->quality + $sum);
        }
    }

    /**
     * Reduce quality if not exceeds the limit
     */
    public function reduceQuality($num = 1) {
        if ($this->quality > self::MIN_QUALITY) {
            $this->setQuality($this->quality - $num);
        }
    }

    /**
     * Reduce sell in
     */
    public function reduceSellIn($num = 1)
    {
        $this->setSellIn($this->sellIn - $num);
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
