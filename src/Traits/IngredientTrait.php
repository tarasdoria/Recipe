<?php

declare(strict_types=1);


namespace App\Traits;


use App\Model\IngredientInterface;

/**
 * Trait IngredientTrait
 * @package App\Traits
 */
trait IngredientTrait
{

    /**
     * @var IngredientInterface|null
     */
    protected $ingredient;

    /**
     * @return IngredientInterface|null
     */
    public function getIngredient(): ?IngredientInterface
    {
        return $this->ingredient;
    }

    /**
     * @param IngredientInterface|null $ingredient
     */
    public function setIngredient(?IngredientInterface $ingredient): void
    {
        $this->ingredient = $ingredient;
    }
}