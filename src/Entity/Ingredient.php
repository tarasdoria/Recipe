<?php

declare(strict_types=1);


namespace App\Entity;

use App\Model\IngredientInterface;
use App\Traits\ImageTrait;
use App\Traits\NamingTrait;
use App\Traits\ProductsTrait;
use App\Traits\RecipesQuantityTrait;
use App\Traits\ResourceTrait;

/**
 * Class Ingredient
 * @package App\Entity
 */
class Ingredient implements IngredientInterface
{
    use ResourceTrait;
    use NamingTrait;
    use RecipesQuantityTrait;
    use ProductsTrait;
    use ImageTrait;

    /** @var int|null */
    protected $cal;

    /** @var string|null */
    protected $type;

    /**
     * @return int|null
     */
    public function getCal(): ?int
    {
        return $this->cal;
    }

    /**
     * @param int|null $cal
     */
    public function setCal(?int $cal): void
    {
        $this->cal = $cal;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }


}