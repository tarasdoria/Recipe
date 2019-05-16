<?php

declare(strict_types=1);


namespace App\Model\Aware;


use App\Model\ProductInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Interface ProductsAwareInterface
 * @package App\Model\Aware
 */
interface ProductsAwareInterface
{
    /**
     * @return Collection
     */
    public function getProducts(): ?Collection;

    /**
     * @param ProductInterface $product
     */
    public function addProduct(ProductInterface $product): void ;

    /**
     * @param ProductInterface $product
     */
    public function removeProduct(ProductInterface $product): void ;

    /**
     * @param ProductInterface $product
     *
     * @return bool
     */
    public function hasProduct(ProductInterface $product): bool;

    /**
     * @return bool
     */
    public function hasProducts(): bool;
}