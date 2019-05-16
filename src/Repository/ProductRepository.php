<?php

declare(strict_types=1);


namespace App\Repository;

use App\Repository\Model\ProductRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;

/**
 * Class ProductRepository
 * @package App\Repository
 */
class ProductRepository extends EntityRepository implements ProductRepositoryInterface
{
    /**
     * @param array         $params
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $params, FormInterface $form)
    {
        $qb = $this->createQueryBuilder('p');

        foreach ($params as $field => $value) {
            $innerType = get_class($form->get($field)->getConfig()->getType()->getInnerType());
            if (in_array($innerType, [TextType::class])) {
                $qb->orWhere('p.' . $field . ' LIKE :' . $field)
                    ->setParameter($field, '%' . $value . '%');
            }

            if (in_array($innerType, [IntegerType::class])) {
                $qb->orWhere('p.' . $field . ' = :' . $field)
                    ->setParameter($field, $value);
            }

        }

        return $qb
            ->getQuery()
            ->getResult();
    }
}