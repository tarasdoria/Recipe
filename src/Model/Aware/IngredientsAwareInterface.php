<?php

declare(strict_types=1);


namespace App\Model\Aware;


use App\Model\IngredientInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Interface IngredientsAwareInterface
 * @package App\Model\Aware
 */
interface IngredientsAwareInterface
{
    /**
     * @return Collection
     */
    public function getIngredients(): ?Collection;

    /**
     * @param IngredientInterface $ingredient
     */
    public function addIngredient(IngredientInterface $ingredient): void ;

    /**
     * @param IngredientInterface $ingredient
     */
    public function removeIngredient(IngredientInterface $ingredient): void ;

    /**
     * @param IngredientInterface $ingredient
     *
     * @return bool
     */
    public function hasIngredient(IngredientInterface $ingredient): bool;

    /**
     * @return bool
     */
    public function hasIngredients(): bool;
}