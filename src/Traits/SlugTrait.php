<?php

declare(strict_types=1);


namespace App\Traits;

/**
 * Trait SlugTrait
 * @package App\Traits
 */
trait SlugTrait
{
    /**
     * @var string|null
     */
    protected $slug;

    /**
     * @return string|null
     */
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    /**
     * @param string|null $slug
     */
    public function setSlug(?string $slug): void
    {
        $this->slug = $slug;
    }

}