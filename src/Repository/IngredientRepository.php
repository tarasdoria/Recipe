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
class IngredientRepository extends EntityRepository implements IngredientRepositoryInterface
{
    /**
     * @param array         $params
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $params, FormInterface $form)
    {
        $qb = $this->createQueryBuilder('i');

        foreach ($params as $field => $value) {
            $innerType = get_class($form->get($field)->getConfig()->getType()->getInnerType());
            if (in_array($innerType, [TextType::class])) {
                $qb->orWhere('i.' . $field . ' LIKE :' . $field)
                    ->setParameter($field, '%' . $value . '%');
            }

            if (in_array($innerType, [IntegerType::class]) || in_array($innerType, [ChoiceType::class])) {
                $qb->orWhere('i.' . $field . ' = :' . $field)
                    ->setParameter($field, $value);
            }

        }

        return $qb
            ->getQuery()
            ->getResult();
    }
}