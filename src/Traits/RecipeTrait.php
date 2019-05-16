<?php

declare(strict_types=1);


namespace App\Traits;

use App\Model\RecipeInterface;

/**
 * Trait RecipeTrait
 * @package App\Traits
 */
trait RecipeTrait
{

    /**
     * @var RecipeInterface|null
     */
    protected $recipe;

    /**
     * @return RecipeInterface|null
     */
    public function getRecipe(): ?RecipeInterface
    {
        return $this->recipe;
    }

    /**
     * @param RecipeInterface|null $recipe
     */
    public function setRecipe(?RecipeInterface $recipe): void
    {
        $this->recipe = $recipe;
    }
}