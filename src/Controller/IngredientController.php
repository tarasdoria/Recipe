<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Ingredient;
use App\Form\Type\IngredientSearchType;
use App\Form\Type\IngredientType;

/**
 * Class IngredientController
 * @package App\Controller
 */
class IngredientController extends ResourceController
{
    /**
     * @return string
     */
    protected function getEntityClass(): string
    {
        return Ingredient::class;
    }

    /**
     * @return string
     */
    protected function getFormFilter(): string
    {
        return IngredientSearchType::class;
    }

    /**
     * @return string
     */
    protected function getFormType(): string
    {
        return IngredientType::class;
    }

}