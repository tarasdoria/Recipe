<?php

declare(strict_types=1);


namespace App\Model\Aware;


use App\Model\StorageInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Interface StoragesAwareInterface
 * @package App\Model\Aware
 */
interface StoragesAwareInterface
{
    /**
     * @return Collection
     */
    public function getStorages(): ?Collection;

    /**
     * @param StorageInterface $storage
     */
    public function addStorage(StorageInterface $storage): void ;

    /**
     * @param StorageInterface $storage
     */
    public function removeStorage(StorageInterface $storage): void ;

    /**
     * @param StorageInterface $storage
     *
     * @return bool
     */
    public function hasStorage(StorageInterface $storage): bool;

    /**
     * @return bool
     */
    public function hasStorages(): bool;
}