<?php

declare(strict_types=1);


namespace App\DBAL\Types;

use Fresh\DoctrineEnumBundle\DBAL\Types\AbstractEnumType;

/**
 * Class IngredientType
 * @package App\DBAL\Types
 */
final class IngredientType extends AbstractEnumType
{
    public const MATIERE_GRASSE = 'MG';
    public const SUCRE = 'S';
    public const PRODUIT_LAITIER = 'PL';
    public const FARINE = 'FA';
    public const VIANDE = 'V';
    public const POISSON = 'P';
    public const CEREALE = 'C';
    public const LEGUMINEUSE = 'LG';
    public const FECULENT = 'FE';
    public const LEGUME = 'L';
    public const FRUIT = 'F';
    public const BOISSON = 'B';
    public const OEUF = 'O';
    public const AUTRE = 'A';

    /** @var array  */
    protected static $choices = [
        self::MATIERE_GRASSE => 'Matière grasse',
        self::SUCRE => 'Sucre',
        self::PRODUIT_LAITIER => 'Produit laitier',
        self::FARINE => 'Farine',
        self::VIANDE => 'Viande',
        self::POISSON => 'Poisson',
        self::CEREALE => 'Cereale',
        self::LEGUMINEUSE => 'Legumineuse',
        self::FECULENT => 'Feculent',
        self::LEGUME => 'Legume',
        self::FRUIT => 'Fruit',
        self::BOISSON => 'Boisson',
        self::OEUF => 'Œuf',
        self::AUTRE => 'Autre',
    ];
}