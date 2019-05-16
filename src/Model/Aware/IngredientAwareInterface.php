<?php

declare(strict_types=1);

namespace App\Model\Aware;


use App\Model\IngredientInterface;

/**
 * Interface IngredientAwareInterface
 * @package App\Model\Aware
 */
interface IngredientAwareInterface
{
    /**
     * @return Ingredientinterface|null
     */
    public function getIngredient(): ?IngredientInterface;

    /**
     * @param Ingredientinterface|null $ingredient
     */
    public function setIngredient(?Ingredientinterface $ingredient): void;
}