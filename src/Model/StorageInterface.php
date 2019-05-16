<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\DescriptionAwareInterface;
use App\Model\Aware\NamingAwareInterface;
use App\Model\Aware\ProductsAwareInterface;

/**
 * Interface StorageInterface
 * @package App\Model
 */
interface StorageInterface extends
    ResourceInterface,
    DescriptionAwareInterface,
    NamingAwareInterface,
    ProductsAwareInterface
{

}