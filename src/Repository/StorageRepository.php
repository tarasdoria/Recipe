<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\StorageRepositoryInterface;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormInterface;

/**
 * Class StorageRepository
 * @package App\Repository
 */
class StorageRepository extends EntityRepository implements StorageRepositoryInterface
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

        foreach ($params as $field => $value){
            $innerType = get_class($form->get($field)->getConfig()->getType()->getInnerType());
            if (in_array($innerType, [TextType::class])) {
                $qb->orWhere('i.' . $field . ' LIKE :' . $field)
                    ->setParameter($field, '%' . $value . '%');
            }
        }

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
}