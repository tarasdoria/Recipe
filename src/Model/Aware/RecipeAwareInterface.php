<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\RecipeInterface;

/**
 * Interface RecipeAwareInterface
 * @package App\Model\Aware
 */
interface RecipeAwareInterface
{
    /**
     * @return RecipeInterface|null
     */
    public function getRecipe(): ?RecipeInterface;

    /**
     * @param RecipeInterface|null $recipe
     */
    public function setRecipe(?RecipeInterface $recipe): void;
}