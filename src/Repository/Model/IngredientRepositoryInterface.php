<?php

declare(strict_types=1);


namespace App\Repository\Model;

use Symfony\Component\Form\FormInterface;

/**
 * Interface IngredientRepositoryInterface
 * @package App\Repository\Model
 */
interface IngredientRepositoryInterface
{
    /**
     * @param array         $params
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $params, FormInterface $form);
}