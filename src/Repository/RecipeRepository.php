<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\RecipeRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;

/**
 * Class RecipeRepository
 * @package App\Repository
 */
class RecipeRepository extends EntityRepository implements RecipeRepositoryInterface
{
    /**
     * @param array         $params
     * @param FormInterface $form
     *
     * @return mixed
     */
    public function getAll(array $params, FormInterface $form)
    {
        $qb = $this->createQueryBuilder('r')
            ->orderBy('r.createDate', 'DESC');

        foreach ($params as $field => $value) {
            $innerType = get_class($form->get($field)->getConfig()->getType()->getInnerType());
            if (in_array($innerType, [TextType::class])) {
                $qb->orWhere('r.' . $field . ' LIKE :' . $field)
                    ->setParameter($field, '%' . $value . '%');
            }

            if (in_array($innerType, [DateType::class])) {
                $qb->orWhere('r.' . $field . ' BETWEEN :' . $field . '_before  AND :' . $field . '_after')
                    ->setParameter($field . '_before', $value . ' 00:00:00')
                    ->setParameter($field . '_after', $value . ' 23:00:00');
            }
        }

        return $qb
            ->getQuery()
            ->getResult();

    }

    /**
     * @param $limit
     *
     * @return mixed
     */
    public function getLastRecipes($limit)
    {
        $qb = $this->createQueryBuilder('r');

        $qb->orderBy('r.createDate', 'DESC')
            ->setMaxResults($limit);
        return $qb
            ->getQuery()
            ->getResult();
    }
}