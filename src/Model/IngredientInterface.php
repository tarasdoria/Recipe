<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\ImageAwareInterface;
use App\Model\Aware\NamingAwareInterface;
use App\Model\Aware\ProductsAwareInterface;
use App\Model\Aware\RecipesQuantityAwareInterface;

/**
 * Interface IngredientInterface
 * @package App\Model
 */
interface IngredientInterface extends
    ResourceInterface,
    NamingAwareInterface,
    RecipesQuantityAwareInterface,
    ProductsAwareInterface,
    ImageAwareInterface
{
    /**
     * @return int|null
     */
    public function getCal(): ?int;

    /**
     * @param int|null $cal
     */
    public function setCal(?int $cal): void;

    /**
     * @return string|null
     */
    public function getType(): ?string;

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void;

}