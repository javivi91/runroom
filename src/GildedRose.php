<?php

namespace Runroom\GildedRose;

class GildedRose
{
    const LIMIT_LEVEL_1 = 6;
    const LIMIT_LEVEL_2 = 11;
    const MAX_SELL_IN = 0;

    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            if ($item->getName() != 'Aged Brie' && $item->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                    $item->reduceQuality();
                }
            } else {
                if ($item->getQuality() < 50) {
                    $item->setQuality($item->getQuality() + 1);
                    if ($item->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->getSellIn() < self::LIMIT_LEVEL_2) {
                            $item->increaseQuality();
                        }
                        if ($item->getSellIn() < self::LIMIT_LEVEL_1) {
                            $item->increaseQuality();
                        }
                    }
                }
            }

            if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                $item->reduceSellIn();
            }

            if ($item->getSellIn() < self::MAX_SELL_IN) {
                if ($item->getName() != 'Aged Brie') {
                    if ($item->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                            $item->reduceQuality();
                        }
                    } else {
                        $item->setQuality(0);
                    }
                } else {
                    $item->increaseQuality();
                }
            }
        }
    }
}
