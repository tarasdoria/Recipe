<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\IngredientInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait manageIngredientTrait
 * @package App\Traits
 */
trait IngredientsTrait
{
    /**
     * @var Collection|[]
     */
    public $ingredients;


    /**
     *
     */
    protected function initIngredientsTrait(): void {
        $this->ingredients = new ArrayCollection();
    }

    /**
     * @param IngredientInterface $ingredient
     */
    public function addIngredient(IngredientInterface $ingredient): void {
        if(!$this->hasIngredient($ingredient)) {
            $this->ingredients->add($ingredient);
        }
    }

    /**
     * @param IngredientInterface $ingredient
     */
    public function removeIngredient(IngredientInterface $ingredient): void {
        if($this->hasIngredient($ingredient)) {
            $this->ingredients->removeElement($ingredient);
        }
    }

    /**
     * @param IngredientInterface $ingredient
     *
     * @return bool
     */
    public function hasIngredient(IngredientInterface $ingredient): bool {
        return $this->ingredients->contains($ingredient);
    }

    /**
     * @return bool
     */
    public function hasIngredients(): bool {
        return !$this->ingredients->isEmpty();
    }

    /**
     * @return Collection
     */
    public function getIngredients(): ?Collection
    {
        return $this->ingredients;
    }

}