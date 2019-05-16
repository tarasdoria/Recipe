<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\IngredientQuantityInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Interface IngredientsAwareInterface
 * @package App\Model\Aware
 */
interface IngredientsQuantityAwareInterface
{
    /**
     * @return Collection|null
     */
    public function getIngredientsQuantity(): ?Collection;

    /**
     * @param IngredientQuantityInterface $ingredientQuantity
     */
    public function addIngredientsQuantity(IngredientQuantityInterface $ingredientQuantity): void;

    /**
     * @param IngredientQuantityInterface $ingredientQuantity
     */
    public function removeIngredientsQuantity(IngredientQuantityInterface $ingredientQuantity): void;
}