<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Storage;
use App\Form\Type\StorageSearchType;
use App\Form\Type\StorageType;

/**
 * Class AdminController
 * @package App\Controller
 */
class StorageController extends ResourceController
{
    /**
     * @return string
     */
    protected function getEntityClass(): string
    {
        return Storage::class;
    }

    /**
     * @return string
     */
    protected function getFormFilter(): string
    {
        return StorageSearchType::class;
    }

    /**
     * @return string
     */
    protected function getFormType(): string
    {
        return StorageType::class;
    }
}