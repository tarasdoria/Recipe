<?php

declare(strict_types=1);

namespace App\Traits;

use Doctrine\Common\Collections\Collection;

/**
 * Trait RecipeQuantityTrait
 * @package App\Traits
 */
trait RecipesQuantityTrait
{

    /**
     * @var Collection|null
     */
    protected $recipesQuantity;

    /**
     * @return Collection|null
     */
    public function getRecipesQuantity(): ?Collection
    {
        return $this->recipesQuantity;
    }

    /**
     * @param Collection|null $recipesQuantity
     */
    public function setRecipesQuantity(?Collection $recipesQuantity): void
    {
        $this->recipesQuantity = $recipesQuantity;
    }
}