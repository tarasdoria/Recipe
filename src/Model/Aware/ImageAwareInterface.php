<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\ImageInterface;

/**
 * Interface ImageAwareInterface
 * @package App\Model\Aware
 */
interface ImageAwareInterface
{
    /**
     * @return ImageInterface|null
     */
    public function getImage(): ?ImageInterface;

    /**
     * @param ImageInterface|null $image
     */
    public function setImage(?ImageInterface $image): void;
}