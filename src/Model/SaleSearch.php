<?php
namespace App\Model;

class SaleSearch {

    /**
     * @var int
     */
    private $maxPrice;

    /**
     * @var int
     */
    private $minSurface;


    /**
     * @return int
     */
    public function getMaxPrice(): int
    {
        return $this->maxPrice;
    }

    /**
     * @param int $maxPrice
     * @return SaleSearch
     */
    public function setMaxPrice(int $maxPrice): SaleSearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int
     */
    public function getMinSurface(): int
    {
        return $this->minSurface;
    }

    /**
     * @param int $minSurface
     * @return SaleSearch
     */
    public function setMinSurface(int $minSurface): SaleSearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }
}