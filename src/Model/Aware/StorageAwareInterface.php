<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\StorageInterface;

/**
 * Interface StorageAwareInterface
 * @package App\Model\Aware
 */
interface StorageAwareInterface
{
    /**
     * @return Storageinterface|null
     */
    public function getStorage(): ?StorageInterface;

    /**
     * @param Storageinterface|null $storage
     */
    public function setStorage(?Storageinterface $storage): void;
}