<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\ProductInterface;
use App\Traits\DescriptionTrait;
use App\Traits\IngredientTrait;
use App\Traits\ResourceTrait;
use App\Traits\StoragesTrait;
use App\Traits\StorageTrait;

/**
 * Class Product
 * @package App\Entity
 */
class Product implements ProductInterface
{
    use DescriptionTrait,
        ResourceTrait,
        StoragesTrait,
        IngredientTrait;

    /** @var \DateTime */
    protected $perempDate;

    /** @var int|null */
    protected $quantity;

    /** @var int|null */
    protected $price;

    /**
     * Product constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        $this->initStoragesTrait();
        $this->perempDate = new \DateTime();
    }

    /**
     * @return \DateTime
     */
    public function getPerempDate(): \DateTime
    {
        return $this->perempDate;
    }

    /**
     * @param \DateTime $perempDate
     */
    public function setPerempDate(\DateTime $perempDate = null): void
    {
        $this->perempDate = $perempDate;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

}