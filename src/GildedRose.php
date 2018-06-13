<?php

namespace Runroom\GildedRose;

class GildedRose
{
    const SELLIN_LIMIT_0 = 0;
    const SELLIN_LIMIT_1 = 5;
    const SELLIN_LIMIT_2 = 10;

    private $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    /**
     * Update quality of items
     */
    public function updateQuality()
    {
        foreach ($this->items as $item) {
            switch ($item->getName()) {
                case 'Sulfuras, Hand of Ragnaros':
                    break;
                case 'Aged Brie':
                    $this->updateAgedQuality($item);
                    break;
                case 'Backstage passes to a TAFKAL80ETC concert':
                    $this->updateBackstageQuality($item);
                    break;
                default:
                    $this->updateDefaultQuality($item);
                    break;
            }
        }
    }

    /**
     * Update quality of 'Aged Brie' item
     */
    private function updateAgedQuality($item)
    {
        $item->reduceSellIn();

        if ($item->getSellIn() < self::SELLIN_LIMIT_0) {
            $item->increaseQuality(2);
        } else {
            $item->increaseQuality();
        }
    }

    /**
     * Update quality of 'Backstage TAFKAL80ETC' item
     */
    private function updateBackstageQuality($item)
    {
        $item->reduceSellIn();

        if ($item->getSellIn() < self::SELLIN_LIMIT_0) {
            $item->setQuality(0);
        } elseif ($item->getSellIn() < self::SELLIN_LIMIT_1) {
            $item->increaseQuality(3);
        } elseif ($item->getSellIn() < self::SELLIN_LIMIT_2) {
            $item->increaseQuality(2);
        } else {
            $item->increaseQuality();
        }

    }

    /**
     * Update quality of default item
     */
    private function updateDefaultQuality($item)
    {
        $item->reduceSellIn();

        if ($item->getSellIn() < self::SELLIN_LIMIT_0) {
            $item->reduceQuality(2);
        } else {
            $item->reduceQuality();
        }
    }
}
