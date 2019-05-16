<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\StorageInterface;
use App\Traits\DescriptionTrait;
use App\Traits\NamingTrait;
use App\Traits\ProductsTrait;
use App\Traits\ProductTrait;
use App\Traits\ResourceTrait;

/**
 * Class Storage
 * @package App\Entity
 */
class Storage implements StorageInterface
{
    use ResourceTrait,
        NamingTrait,
        DescriptionTrait,
        ProductsTrait;


}