<?php

declare(strict_types=1);

namespace App\Model\Aware;

use Doctrine\Common\Collections\Collection;

/**
 * Interface IngredientsAwareInterface
 * @package App\Model\Aware
 */
interface RecipesQuantityAwareInterface
{
    /**
     * @return Collection|null
     */
    public function getRecipesQuantity(): ?Collection;

    /**
     * @param Collection|null $recipesQuantity
     */
    public function setRecipesQuantity(?Collection $recipesQuantity): void;
}