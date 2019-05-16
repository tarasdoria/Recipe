<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\ProductInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait manageProductTrait
 * @package App\Traits
 */
trait ProductsTrait
{
    /**
     * @var Collection|[]
     */
    public $products;


    /**
     *
     */
    protected function initProductsTrait(): void {
        $this->products = new ArrayCollection();
    }

    /**
     * @param ProductInterface $product
     */
    public function addProduct(ProductInterface $product): void {
        if(!$this->hasProduct($product)) {
            $this->products->add($product);
        }
    }

    /**
     * @param ProductInterface $product
     */
    public function removeProduct(ProductInterface $product): void {
        if($this->hasProduct($product)) {
            $this->products->removeElement($product);
        }
    }

    /**
     * @param ProductInterface $product
     *
     * @return bool
     */
    public function hasProduct(ProductInterface $product): bool {
        return $this->products->contains($product);
    }

    /**
     * @return bool
     */
    public function hasProducts(): bool {
        return !$this->products->isEmpty();
    }

    /**
     * @return Collection
     */
    public function getProducts(): ?Collection
    {
        return $this->products;
    }

}