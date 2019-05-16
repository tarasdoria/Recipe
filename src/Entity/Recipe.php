<?php
// src/Entity/Recipe.php
declare(strict_types=1);

namespace App\Entity;

use App\Model\RecipeInterface;
use App\Traits\AuthorTrait;
use App\Traits\CreateDateTrait;
use App\Traits\DescriptionTrait;
use App\Traits\ImageTrait;
use App\Traits\IngredientsQuantityTrait;
use App\Traits\NamingTrait;
use App\Traits\ResourceTrait;
use App\Traits\SlugTrait;

/**
 * Class Recipe
 * @package App\Entity
 */
class Recipe implements RecipeInterface
{
    use DescriptionTrait,
        AuthorTrait,
        ResourceTrait,
        NamingTrait,
        CreateDateTrait,
        SlugTrait,
        IngredientsQuantityTrait,
        ImageTrait;

    /** @var int|null */
    protected $prepTime;

    /** @var int|null */
    protected $cookTime;

    /** @var int|null */
    protected $cal = 0;

    /** @var int|null */
    protected $nbPart = 0;


    /*---------- Getters and setters ------------*/

    public function __construct()
    {
        $this->initIngredientsQuantityTrait();
        $this->initCreateDateAwareTrait();
    }

    /**
     * @return int|null
     */
    public function getPrepTime(): ?int
    {
        return $this->prepTime;
    }

    /**
     * @param int|null $prepTime
     */
    public function setPrepTime(?int $prepTime): void
    {
        $this->prepTime = $prepTime;
    }

    /**
     * @return int|null
     */
    public function getCookTime(): ?int
    {
        return $this->cookTime;
    }

    /**
     * @param int|null $cookTime
     */
    public function setCookTime(?int $cookTime): void
    {
        $this->cookTime = $cookTime;
    }

    /**
     * @return int|null
     */
    public function getCal(): ?int
    {
        return $this->cal;
    }

    /**
     * @param int|null $cal
     */
    public function setCal(?int $cal): void
    {
        $this->cal = $cal;
    }

    /**
     * @return int|null
     */
    public function getNbPart(): ?int
    {
        return $this->nbPart;
    }

    /**
     * @param int|null $nbPart
     */
    public function setNbPart(?int $nbPart): void
    {
        $this->nbPart = $nbPart;
    }
//
//    /**
//     * @param IngredientQuantityInterface $ingredientQuantity
//     */
//    public function addIngredientsQuantity(IngredientQuantityInterface $ingredientQuantity): void
//    {
////        if (!$this->hasIngredient($ingredientQuantity)) {
//            $ingredientQuantity->setRecipe($this);
//            $this->ingredientsQuantity->add($ingredientQuantity);
////        }
//    }
}