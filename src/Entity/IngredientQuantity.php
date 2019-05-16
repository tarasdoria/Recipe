<?php

declare(strict_types=1);


namespace App\Entity;


use App\Model\IngredientQuantityInterface;
use App\Model\RecipeInterface;
use App\Traits\IngredientTrait;
use App\Traits\RecipeTrait;
use App\Traits\ResourceTrait;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Class IngredientQuantity
 * @package App\Entity
 * @UniqueEntity(fields={"ingredient","recipe"})
 */
class IngredientQuantity implements IngredientQuantityInterface
{
    use ResourceTrait;
    use IngredientTrait;
    use RecipeTrait;


    /** @var float|null */
    protected $quantity = 0;

    /**
     * @var string|null
     */
    protected $unit;


    /*---------- Getters and setters ------------*/

    /**
     * @return float|null
     */
    public function getQuantity(): ?float
    {
        return $this->quantity;
    }

    /**
     * @param float|null $quantity
     */
    public function setQuantity(?float $quantity): void
    {
        $this->quantity = $quantity;
    }


    /**
     * @param RecipeInterface|null $recipe
     */
    public function setRecipe(?RecipeInterface $recipe): void
    {
        $this->recipe = $recipe;
    }

    /**
     * @return string|null
     */
    public function getUnit(): ?string
    {
        return $this->unit;
    }

    /**
     * @param string|null $unit
     */
    public function setUnit(?string $unit): void
    {
        $this->unit = $unit;
    }
}