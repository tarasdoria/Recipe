<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\ImageInterface;

/**
 * Trait ResourceTrait
 * @package App\Traits
 */
trait ImageTrait
{

    /**
     * @var ImageInterface|null
     */
    protected $image;

    /**
     * @return ImageInterface|null
     */
    public function getImage(): ?ImageInterface
    {
        return $this->image;
    }

    /**
     * @param ImageInterface|null $image
     */
    public function setImage(?ImageInterface $image): void
    {
        $this->image = $image;
    }
}