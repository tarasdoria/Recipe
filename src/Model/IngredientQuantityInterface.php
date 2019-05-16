<?php

declare(strict_types=1);


namespace App\Model;


use App\Model\Aware\IngredientAwareInterface;
use App\Model\Aware\RecipeAwareInterface;

/**
 * Interface IngredientQuantityInterface
 * @package App\Model
 */
interface IngredientQuantityInterface extends
    ResourceInterface,
    RecipeAwareInterface,
    IngredientAwareInterface
{
    /**
     * @return float|null
     */
    public function getQuantity(): ?float;

    /**
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void;

    /**
     * @return string|null
     */
    public function getUnit(): ?string;

    /**
     * @param string|null $unit
     */
    public function setUnit(?string $unit): void;
}