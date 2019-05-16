<?php

declare(strict_types=1);

namespace App\Model\Aware;

/**
 * Interface AuthorAwareInterface
 * @package App\Model\Aware
 */
interface AuthorAwareInterface
{
    /**
     * @return string|null
     */
    public function getAuthor(): ?string;

    /**
     * @param string|null $author
     */
    public function setAuthor(?string $author): void;
}