<?php

declare(strict_types=1);


namespace App\Traits;

/**
 * Trait ResourceTrait
 * @package App\Traits
 */
trait ResourceTrait
{

    /**
     * @var string|null
     */
    protected $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}