<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\StorageInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait manageStorageTrait
 * @package App\Traits
 */
trait StoragesTrait
{
    /**
     * @var Collection|[]
     */
    public $storages;


    /**
     *
     */
    protected function initStoragesTrait(): void {
        $this->storages = new ArrayCollection();
    }

    /**
     * @param StorageInterface $storage
     */
    public function addStorage(StorageInterface $storage): void {
        if(!$this->hasStorage($storage)) {
            $this->storages->add($storage);
        }
    }

    /**
     * @param StorageInterface $storage
     */
    public function removeStorage(StorageInterface $storage): void {
        if($this->hasStorage($storage)) {
            $this->storages->removeElement($storage);
        }
    }

    /**
     * @param StorageInterface $storage
     *
     * @return bool
     */
    public function hasStorage(StorageInterface $storage): bool {
        return $this->storages->contains($storage);
    }

    /**
     * @return bool
     */
    public function hasStorages(): bool {
        return !$this->storages->isEmpty();
    }

    /**
     * @return Collection
     */
    public function getStorages(): ?Collection
    {
        return $this->storages;
    }

}