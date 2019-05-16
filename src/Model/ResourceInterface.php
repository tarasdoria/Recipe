<?php
declare(strict_types=1);

namespace App\Model;

/**
 * Interface ResourceInterface
 * @package App\Model
 */
interface ResourceInterface
{

    /**
     * @return int|null
     */
    public function getId(): ?int;
}