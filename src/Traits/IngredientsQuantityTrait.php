<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\IngredientQuantityInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait IngredientsQuantityTrait
 * @package App\Traits
 */
trait IngredientsQuantityTrait
{

    /**
     * @var Collection|null
     */
    protected $ingredientsQuantity;

    /**
     *
     */
    protected function initIngredientsQuantityTrait(): void {
        $this->ingredientsQuantity = new ArrayCollection();
    }

    /**
     * @return Collection|null
     */
    public function getIngredientsQuantity(): Collection
    {
        return $this->ingredientsQuantity;
    }


    /**
     * @param IngredientQuantityInterface $ingredientQuantity
     */
    public function addIngredientsQuantity(IngredientQuantityInterface $ingredientQuantity): void
    {
        $ingredientQuantity->setRecipe($this);
        $this->ingredientsQuantity->add($ingredientQuantity);
    }

    /**
     * @param IngredientQuantityInterface $ingredientQuantity
     */
    public function removeIngredientsQuantity(IngredientQuantityInterface $ingredientQuantity): void
    {
        $this->ingredientsQuantity->removeElement($ingredientQuantity);
    }
}