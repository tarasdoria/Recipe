<?php

declare(strict_types=1);


namespace App\Repository\Model;

use Symfony\Component\Form\FormInterface;

/**
 * Interface RecipeRepositoryInterface
 * @package App\Repository\Model
 */
interface RecipeRepositoryInterface
{
    /**
     * @param array         $params
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $params, FormInterface $form);

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getLastRecipes($limit);

}