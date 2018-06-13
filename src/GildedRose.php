<?php

namespace Runroom\GildedRose;

class GildedRose
{
    private $items;

    function __construct($items)
    {
        $this->items = $items;
    }

    function update_quality()
    {
        foreach ($this->items as $item) {
            if ($item->getName() != 'Aged Brie' and $item->getName() != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                    $item->reduceQuality();
                }
            } else {
                if ($item->getQuality() < 50) {
                    $item->setQuality($item->getQuality() + 1);
                    if ($item->getName() == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->getSellIn() < 11) {
                            $item->increaseQuality();
                        }
                        if ($item->getSellIn() < 6) {
                            $item->increaseQuality();
                        }
                    }
                }
            }

            if ($item->getName() != 'Sulfuras, Hand of Ragnaros') {
                $item->reduceSellIn();
            }

            if ($item->getSellIn() < 0) {
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
