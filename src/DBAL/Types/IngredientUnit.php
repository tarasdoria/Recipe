<?php

declare(strict_types=1);


namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * Class IngredientUnit
 * @package App\DBAL\Types
 */
final class IngredientUnit extends AbstractEnumType
{
    public const LITRE = 'l';
    public const MILLILITRE = 'ml';
    public const GRAMME = 'g';
    public const MILLIGRAMME = 'mg';
    public const UNIT = '';


    /** @var array  */
    protected static $choices = [
        self::LITRE => 'L',
        self::MILLILITRE => 'ml',
        self::GRAMME => 'g',
        self::MILLIGRAMME => 'mg',
        self::UNIT => "Pas d'unité",

    ];
}