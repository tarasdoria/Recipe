<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\DescriptionAwareInterface;
use App\Model\Aware\IngredientAwareInterface;
use App\Model\Aware\StoragesAwareInterface;

/**
 * Interface ProductInterface
 * @package App\Model
 */
interface ProductInterface extends
    ResourceInterface,
    DescriptionAwareInterface,
    StoragesAwareInterface,
    IngredientAwareInterface
{
    /**
     * @return \DateTime
     */
    public function getPerempDate(): \DateTime;

    /**
     * @param \DateTime $perempDate
     */
    public function setPerempDate(\DateTime $perempDate): void;
    /**
     * @return int|null
     */
    public function getQuantity(): ?int;

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void;

    /**
     * @return int|null
     */
    public function getPrice(): ?int;

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void;

}