<?php

declare(strict_types=1);


namespace App\Repository\Model;

use Symfony\Component\Form\FormInterface;

/**
 * Interface StorageRepositoryInterface
 * @package App\Repository\Model
 */
interface StorageRepositoryInterface
{
    /**
     * @param array         $filters
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $filters, FormInterface $form);
}