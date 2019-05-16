<?php

declare(strict_types=1);


namespace App\Model\Aware;


interface SlugAwareInterface
{
    /**
     * @return string|null
     */
    public function getSlug(): ?string;

    /**
     * @param string|null $slug
     */
    public function setSlug(?string $slug): void;
}