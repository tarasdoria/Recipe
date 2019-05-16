<?php

declare(strict_types=1);


namespace App\Model\Aware;

/**
 * Interface NamingAwareInterface
 * @package App\Model\Aware
 */
interface NamingAwareInterface
{
    /**
     * @return string|null
     */
    public function getName(): ?string;

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void;
}