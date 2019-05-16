<?php

declare(strict_types=1);


namespace App\Traits;

/**
 * Trait NamingTrait
 * @package App\Traits
 */
trait NamingTrait
{

    /** @var string|null */
    protected $name;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}