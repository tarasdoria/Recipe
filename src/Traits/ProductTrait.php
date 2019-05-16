<?php

declare(strict_types=1);


namespace App\Traits;


use App\Model\ProductInterface;

/**
 * Trait ProductTrait
 * @package App\Traits
 */
trait ProductTrait
{

    /**
     * @var ProductInterface|null
     */
    protected $product;

    /**
     * @return ProductInterface|null
     */
    public function getStorage(): ?ProductInterface
    {
        return $this->product;
    }

    /**
     * @param ProductInterface|null $product
     */
    public function setStorage(?ProductInterface $product): void
    {
        $this->product = $product;
    }
}