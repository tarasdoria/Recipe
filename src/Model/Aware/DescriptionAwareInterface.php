<?php

declare(strict_types=1);

namespace App\Model\Aware;

/**
 * Interface DescriptionAwareInterface
 * @package App\Model\Aware
 */
interface DescriptionAwareInterface
{
    /**
     * @return string|null
     */
    public function getDescription(): ?string;

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void;
}