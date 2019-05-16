<?php

declare(strict_types=1);


namespace App\Traits;

/**
 * Trait AuthorTrait
 * @package App\Traits
 */
trait AuthorTrait
{
    /** @var string|null */
    protected $author;

    /**
     * @return string|null
     */
    public function getAuthor(): ?string
    {
        return $this->author;
    }

    /**
     * @param string|null $author
     */
    public function setAuthor(?string $author): void
    {
        $this->author = $author;
    }
}