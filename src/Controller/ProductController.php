<?php
// src/Controller/RecipeController.php
declare(strict_types=1);

namespace App\Controller;

use App\Entity\Product;
use App\Form\Type\ProductSearchType;
use App\Form\Type\ProductType;

/**
 * Class RecipeController
 * @package App\Controller
 */
class ProductController extends ResourceController
{
    /**
     * @return string
     */
    protected function getEntityClass(): string
    {
        return Product::class;
    }

    /**
     * @return string
     */
    protected function getFormFilter(): string
    {
        return ProductSearchType::class;
    }

    /**
     * @return string
     */
    protected function getFormType(): string
    {
        return ProductType::class;
    }
}