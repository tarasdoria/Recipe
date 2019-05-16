<?php

declare(strict_types=1);


namespace App\UserBundle\Repository\Model;

use Symfony\Component\Form\FormInterface;

/**
 * Class UserRepositoryInterface
 * @package App\UserBundle\Repository\Model
 */
interface UserRepositoryInterface
{
    /**
     * @param array         $params
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $params, FormInterface $form);
}