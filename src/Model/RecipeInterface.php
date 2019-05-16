<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\AuthorAwareInterface;
use App\Model\Aware\CreateDateAwareInterface;
use App\Model\Aware\DescriptionAwareInterface;
use App\Model\Aware\ImageAwareInterface;
use App\Model\Aware\IngredientsAwareInterface;
use App\Model\Aware\IngredientsQuantityAwareInterface;
use App\Model\Aware\NamingAwareInterface;
use App\Model\Aware\SlugAwareInterface;

/**
 * Interface RecipeInterface
 * @package App\Model
 */
interface RecipeInterface extends
    ResourceInterface,
    DescriptionAwareInterface,
    AuthorAwareInterface,
    CreateDateAwareInterface,
    SlugAwareInterface,
    NamingAwareInterface,
    IngredientsQuantityAwareInterface,
    ImageAwareInterface
{
    /**
     * @return int|null
     */
    public function getPrepTime(): ?int;
    /**
     * @param int|null $prepTime
     */
    public function setPrepTime(?int $prepTime): void;

    /**
     * @return int|null
     */
    public function getCookTime(): ?int;

    /**
     * @param int|null $cookTime
     */
    public function setCookTime(?int $cookTime): void;
    /**
     * @return int|null
     */
    public function getCal(): ?int;

    /**
     * @param int|null $cal
     */
    public function setCal(?int $cal): void;
    /**
     * @return int|null
     */
    public function getNbPart(): ?int;

    /**
     * @param int|null $nbPart
     */
    public function setNbPart(?int $nbPart): void;
}