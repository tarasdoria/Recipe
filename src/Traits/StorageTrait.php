<?php

declare(strict_types=1);


namespace App\Traits;


use App\Model\StorageInterface;

/**
 * Trait StorageTrait
 * @package App\Traits
 */
trait StorageTrait
{

    /**
     * @var StorageInterface|null
     */
    protected $storage;

    /**
     * @return StorageInterface|null
     */
    public function getStorage(): ?StorageInterface
    {
        return $this->storage;
    }

    /**
     * @param StorageInterface|null $storage
     */
    public function setStorage(?StorageInterface $storage): void
    {
        $this->storage = $storage;
    }
}