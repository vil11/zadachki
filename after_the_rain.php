<?php

/**
 * There is a 2D layout which contains bricks of different height.
 * Let's say all bricks have width = 1.
 *
 * Find out the volume of water between the bricks after it stopped raining?
 */

class layout
{
    public $bricks;
    public $waterVolume;

    public function __construct($bricks)
    {
        $this->bricks = $bricks;
        $this->_getWaterVolume();
    }

    private function _getWaterVolume()
    {
        for ($current = 0; $current < count($this->bricks) - 1;) {
            $next = $current + 1;
            if ($this->bricks[$current] > $this->bricks[$next]) {
                $tmp = array_slice($this->bricks, $next);
                $max = array_search(max($tmp), $tmp) + $next;
                if ($max != $next) $this->_getBlockWaterVolume($current, $max);
                $current = $max;
            } else {
                $current++;
            }
        }
    }

    private function _getBlockWaterVolume($leftBorder, $rightBorder)
    {
        $bricksQty = $rightBorder - $leftBorder - 1;
        $blockVolume = min($this->bricks[$leftBorder], $this->bricks[$rightBorder]) * $bricksQty;
        $waterVolume = $blockVolume - $this->_getBricksVolume($leftBorder + 1, $rightBorder - 1);
        $this->waterVolume = $this->waterVolume + $waterVolume;
    }

    private function _getBricksVolume($from, $to)
    {
        $sum = 0;
        for ($i = $from; $i <= $to; $i++) {
            $sum = $sum + $this->bricks[$i];
        }
        return $sum;
    }
}

$bricks_1 = array(3, 16, 18, 1, 5, 7, 5, 15, 12, 8, 0, 14, 14, 3, 1, 2, 1);
$layout = new layout ($bricks_1);
var_dump($layout->waterVolume);