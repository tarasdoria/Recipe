<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\IngredientRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;

/**
 * Class IngredientRepository
 * @package App\Repository
 */
class IngredientQuantityRepository extends EntityRepository
{

}